<?php

namespace app\controllers;

use app\models\Ensignentmodule;
use app\models\Groupemodule;
use app\models\Salle;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['create', 'update', 'view', 'index', 'delete'],
                'rules' => [
                    // deny all POST requests
                    [
                        'allow' => true,
                        'verbs' => ['POST']
                    ],
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
                'denyCallback' => function () {
                    //redirect here
                    $this->redirect(array('site/login'));
                }
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->redirect(array('ensignent/index'));
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * The logic behind schedule a timetable
     * of all the department
     */
    public function actionTimetable()
    {

        //define the resources  of algorithm  of timetable schedule
        //get all class form the database
        $salle = Salle::find()->all();
        //get all associations between teacher and module
        $E_M = Ensignentmodule::find()->all();
        //get programs of all student group
        $M_G = Groupemodule::find()->all();
        //get all Sale available in our department
        $sale = Salle::find()->all();
        //programme of all group initialization
        //days of week 5
        $programme = array(
            //5 hour each day
            array(
                //each group had hour
                array()
            )
        );

        //loop on the 5 days of the week
        for ($i = 0; $i < 5; $i++) {
            //loop on 5 seance of days
            for ($j = 0; $j < 5; $j++) {
                //reinitialize all parameter of our sale and teacher module table will be available after
                //the hour finished
                $temp_sale = $salle;
                $temp_EM = $E_M;
                //flag indicate that the programme is done
                $flag = true;
                //index for salle
                $sale_index = 0;
                //check the all the group if there is teacher available

                Yii::error("begining for loop ");
                Yii::error('flag message that the pipline is begining :'.$flag);
                //check the group if already had a teacher or not
                $group_list = array();
                //check the teacher if he is already had a group
                $teacher_list = array();
                for ($n = 0; $n < count($M_G) && !empty($temp_EM) && !empty($temp_sale) && $flag === true; $n++) {
                    //check if there a teacher or class left
                    Yii::error('the salle index before adding one :' . $sale_index);
                    if (is_array($temp_EM) && count($temp_sale) > $sale_index && $M_G[$n]->nbre > 0 && !in_array($M_G[$n]->id_group,$group_list)) {
                        $index = $this->getME($temp_EM, $M_G[$n]->id_module);
                        //check if the teacher have a class to teach
                        if ($index !== null && !in_array($temp_EM[$index]->id_ensig,$teacher_list)) {
                            array_push($group_list,$M_G[$n]->id_group);
                            array_push($teacher_list,$temp_EM[$index]->id_ensig);
                            Yii::error('the number of group already have teacher is :'.count($group_list));
                            $programme [$i][$j][$n] = array(
                                //take sale for group
                                $temp_sale[$sale_index]->titre . "/",
                                //take module and teacher
                                $temp_EM[$index]->module->titre . " /" . $temp_EM[$index]->ensignent->nom,
                                //take a group
                                $M_G[$n]->group->titre
                            );
                            //subtraction hour from programme
                            $M_G[$n]->nbre--;
                            $sale_index++;
                            Yii::error('the number of repetation:' . $n);
                            Yii::error('the salle index after adding one :' . $sale_index);
                            //unset this module , teacher and sale  to avoid collision
                            if (is_array($temp_EM)) {
                                array_splice($temp_EM, $index, 1);
                                if (!is_array($temp_EM)) $flag = false;
                                Yii::error('flag message inside module ensignant :'.$flag);

                            }
                            if (count($temp_sale) < $sale_index) {
                                $flag = false;
                                Yii::error('flag message inside salle :'.$flag);
                            }
                            //unset the module from group programme if number of our it's done
                        }


                    }
                    Yii::error('flag message that the pipline is end :'.$flag);

                    Yii::error("ending for loop ");

                }
            }

        }


        var_dump($programme[0][0]);
        echo count($programme);
        $model = array(
            'programe' => $programme,
            'days' => array(
                'Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi'
            ),
            'hour' => array('
            Horaires', '08h00-9h35', '09h40-11h10', '11h15-12h45', '12h50-14h10', '14h15-16h45'
            )
        );
        return $this->render('emploi', [
            'model' => $model,
        ]);
    }

    /**
     * the main task of this function is to get  available  teacher for module
     *to avoid reuse a teacher for other student class
     */

    public function getME($e_m, $id_module)
    {
        //check if the input of user is correct to prevent bugs of algorithm
        if (isset($e_m) && isset($id_module) && is_array($e_m)) {
            //Find out if which teacher is available
            for ($i = 0; $i < count($e_m); $i++) {
                //compare with id module
                if ($e_m[$i]->id_module === $id_module)
                    return $i;
            }
        }
        return null;
    }
//echo "<br>this from module title :".$M_G[0]->module->titre;
//$index = $this->getME($E_M,$M_G[0]->id_module);
//echo "<br>this from module title MG :".$E_M[$index]->module->titre;
//
//
//echo '<br>';
//if(null===0)echo "null equal 0";


}
