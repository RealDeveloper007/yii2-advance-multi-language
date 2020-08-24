<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('frontend', 'This username has already been taken.')],
            ['username', 'string', 'min' => 2, 'max' => 255, 'tooShort' => Yii::t('frontend', 'Username should contain at least 2 characters.')],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('frontend', 'This email address has already been taken.')],

            ['password', 'required'],
            ['password', 'string', 'min' => 6, 'tooShort' => Yii::t('frontend', 'Password should contain at least 6 characters.')],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->user_type_id = 1;
        $user->login_by = 'web';
        $user->registration_ip = Yii::$app->getRequest()->getUserIP();
        $user->last_login = date('Y-m-d h:i:s');
        $user->is_premium = 0;
        $user->status = 9;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save() && $this->sendEmail($user);

    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {

        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->params['supportEmail']])
            ->setTo($this->email)
            ->setSubject(Yii::t('frontend', 'Welcome'))
            ->send();
    }
}
