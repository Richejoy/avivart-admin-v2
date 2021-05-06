<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;
use Cake\Mailer\MailerAwareTrait;
use Cake\Mailer\Email;

class AppController extends Controller
{
    use MailerAwareTrait;

    const IMG_PROD_URL = 'https://avivart.net/images/';
    
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
            'viewClassMap' => ['pdf' => 'CakePdf.Pdf'],
        ]);

        $this->loadComponent('Flash');

        $this->loadComponent('Security');

        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password'],
                    'finder' => 'auth',

                ]
            ],
            'loginAction' => ['controller' => 'Pages', 'action' => 'login'],
            'loginRedirect' => ['controller' => 'Pages', 'action' => 'index'],
            'authError' => __('You are not authorized to access that location until you logged.')
        ]);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        I18n::setLocale($this->getRequest()->getSession()->read('locale'));
    }

    protected function getAppropriateUrl($request, string $folder)
    {
        if (!empty($civility_id = $request->getData('civility_id'))) {
            return ($civility_id == 1) ? 'man.png' : 'woman.png';
        }
        
        return 'default.png';
    }

    protected function getAppropriateLink($request, string $folder)
    {
        $url = $this->getAppropriateUrl($request, $folder);

        if (getEnv('DEBUG')) {
            return "http://localhost/avivart/images/{$folder}/{$url}";
        }

        return self::IMG_PROD_URL . "{$folder}/{$url}";
        
    }
}
