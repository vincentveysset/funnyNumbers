<?php
/**
 * Created by PhpStorm.
 * User: user01
 * Date: 05/03/15
 * Time: 16:28
 */

namespace Metinet\AppBundle\Controller;

use Metinet\AppBundle\Entity\User;
use Metinet\AppBundle\Form\Type\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class UserController extends Controller{

    public function registerAction(Request $request){

        $user = new User();

        $form = $this->createForm(new RegisterType(), $user);

        $form->handleRequest($request);

        if ($form->isValid()) {

            $repo = $this->container->get('user_repository.doctrine');
            $repo->save($user);

            $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
            $this->get('security.token_storage')->setToken($token);

            return $this->redirect($this->generateUrl('home'));
        }

        return $this->render('MetinetAppBundle:User:register.html.twig', array(
            'form' => $form->createView(),
        ));
    }

} 