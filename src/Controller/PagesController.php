<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class PagesController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->Auth->allow(['locale', 'logout']);
    }

    public function index()
    {
        $this->set(['user' => $this->Auth->user()]);
    }

    public function login()
    {
        $this->loadModel('Users');

        $user = $this->Users->newEntity();

        if ($this->request->is('POST')) {
            $user = $this->Auth->identify();

            if ($user) {

                $user = $this->Users->get($user['id'], [
                    'contain' => ['Images', 'Civilities', 'UserTypes', 'Roles', 'Countries']
                ]);

                $user->set([
                    'last_login' => new \DateTime(),
                    'nb_login' => ++$user->nb_login
                ]);

                $this->Users->save($user);

                $this->Auth->setUser($user);

                $this->getRequest()->getSession()->write([
                    'user_avatar' => $user->image->link
                ]);

                $this->Flash->success(__('Welcome back ' . $user->full_name));

                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__("Sorry, bad credentials"));
            }
        }

        $this->set(compact('user'));
    }

    public function logout()
    {
        $user = $this->Auth->user();

        $this->request->getSession()->destroy();

        $this->Flash->success(__('We hope to see you very soon ' . $user->full_name));

        return $this->redirect($this->Auth->logout());
    }

    public function locale($locale = 'en_US')
    {
        $this->getRequest()->getSession()->write('locale', $locale);

        if ($this->getRequest()->getParam('action') == 'login') {
            return $this->redirect(['action' => 'login']);
        }

        return $this->redirect($this->referer());
    }

    public function doc()
    {
        # code...
    }
}
