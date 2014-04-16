<?php
//general purpose auth function
$authenticate = function ($app) {
    
    return function () use ($app) {
        
        if (! $app->session->get('user')) {
            $app->session->set('urlRedirect', $app->request()->getPathInfo());
            $app->flash('error', 'Login required');
            $app->redirect($app->request->getRootUri() . '/login/');
        }
    };
};

$app->get('/', function () use ($app) {
    $simple = $app->simple;
    $quizzes = $simple->getQuizzes(true);
    $categories = $simple->getCategories();

    $session = $app->session;

    $app->render('index.php', array('quizzes' => $quizzes, 'categories' => $categories, 'session' => $session));
});

$app->get('/requirements/', function () use ($app) {
    
    $installer = $app->installer;
    $requirements = $installer->getRequirements();
    $simple = $app->simple;
    $categories = $simple->getCategories();
    
    $app->render('requirements.php', array( 'categories' => $categories,'requirements' => $requirements));
    
});

$app->get('/categories/', function () use ($app) {
    $simple = $app->simple;
    $quizzes = $simple->getQuizzes(true);
    $categories = $simple->getCategories();

    $session = $app->session;

    $app->render('index.php', array('quizzes' => $quizzes, 'categories' => $categories, 'session' => $session));
});

$app->get('/login/', function () use ($app) {
    
    $flash = $app->view()->getData('flash'); 
    $error = '';
    if (isset($flash['usererror'])) {
        $error = $flash['usererror'];
    }
    
    $simple = $app->simple;
    $quizzes = $simple->getQuizzes(true);
    $categories = $simple->getCategories();

    $session = $app->session;

    $app->render('login.php', array('quizzes' => $quizzes, 'categories' => $categories, 'session' => $session,'error' => $error));
});

$app->post('/login/', function () use ($app) {
    
    $session = $app->session;
    $simple = $app->simple;
    $errors = array();
    
    $type = trim($app->request->post('type'));
    
    if ($type == 'login') {
        $email = trim($app->request()->post('email'));
        $password = trim($app->request()->post('password'));
    
        //check for 'emptiness' of inputs and display message instead of querying db
        if ((! empty($email)) && (! empty($password) ) )
        {
            if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['loginerror'] = "The email address was invalid. Please try again.";
            }
            else {
                //process inputs for possible admin user
                $authsql = \ORM::for_table('users')->select_many('pass','name','level')->where('email', $email)->find_one();

                //verify the password against hash
                if (! password_verify($password, $authsql->pass)) {
                    $errors['loginerror'] = "The email or password do not match those in our system. Please try again.";
                } else if ($authsql->level == 1) {
                    // We have a valid admin user
                    $session->set('adminuser', true);
                    $session->set('user', $authsql->name);
                    $session->regenerate();
                } else {
                    // We have a valid user
                    $session->set('adminuser', false);
                    $session->set('user', $authsql->name);
                    $session->regenerate();
                }
            }
        }
        else { //email or password empty
            $errors['loginerror'] = "Please fill in email and password fields and try again.";
        }
    } else if ($type == 'register') {
        
        $username = trim($app->request()->post('username'));
        $email = trim($app->request()->post('email'));
        $password = trim($app->request()->post('password'));
        //register a new user
        if (empty($username)) {
            $errors['usernameerror'] = "Please create a username.";

        } else if ( (strlen($username) < 3) || (strlen($username) > 10)) {
            $errors['usernameerror'] = "To register, please enter a username between 3 and 10 characters in length.";

        } else {
            $username = strip_tags(stripslashes($username));
            if (! $simple->userExists($username)) {
                $session->set('user', $username);
                $session->set('score', 0);
                $session->set('correct', array());
                $session->set('wrong', array());
                $session->set('finished', 'no');
                $session->set('num', 0);
                //$session->set('starttime', date('Y-m-d H:i:s'));

                //$app->redirect($app->request->getRootUri() . '/quiz/' . $id . '/test');
            } else {
                $errors['usernameerror'] = 'That name is already registered, please choose another.';
            }
        }
    }//end user registration
    
    if (count($errors) > 0) {
        $app->flash('errors', $errors);
        $session->remove('adminuser');
        $app->redirect($app->request->getRootUri() . '/login/');
    }

    // redirect them to intended url if not index
    if ($session->get('urlRedirect')) {
       $tmp = $session->get('urlRedirect');
       $session->remove('urlRedirect');
       $app->redirect($app->request->getRootUri() . $tmp);
    }
    
    //logged in with no captured url - send to home page
    $app->redirect($app->request->getRootUri());
});

$app->get('/categories/:id', function ($id) use ($app) {
    $simple = $app->simple;
    $category = $simple->getCategory($id);
    $quizzes = $simple->getCategoryQuizzes($id);
    $categories = $simple->getCategories();

    $session = $app->session;

    $app->render('category.php', array('category' => $category, 'quizzes' => $quizzes, 'categories' => $categories, 'session' => $session));
})->conditions(array('id' => '\d+'));