<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 12:12
 */

namespace AppBundle\Infrastructure\Controller;

use AppBundle\Core\Register\Register;
use AppBundle\Core\User\Query\UserQueryInterface;
use AppBundle\Infrastructure\Form\RegisterType;
use AppBundle\Core\Register\Command\RegisterUserCommand;
use SimpleBus\Message\Bus\Middleware\MessageBusSupportingMiddleware;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Templating\EngineInterface;

class RegisterController
{

    /**
     * @var \SimpleBus\Message\Bus\Middleware\MessageBusSupportingMiddleware
     */
    private $messageBus;
    /**
     * @var \Symfony\Component\Form\FormFactoryInterface
     */
    private $formFactory;
    /**
     * @var \Symfony\Component\Templating\EngineInterface
     */
    private $templating;
    /**
     * @var \AppBundle\Core\User\Query\UserQueryInterface
     */
    private $userQuery;
    /**
     * @var \SimpleBus\Message\Bus\Middleware\MessageBusSupportingMiddleware
     */
    private $eventBus;

    public function __construct(
        MessageBusSupportingMiddleware $messageBus,
        MessageBusSupportingMiddleware $eventBus,
        FormFactoryInterface $formFactory,
        EngineInterface $templating,
        UserQueryInterface $userQuery
    )
    {
        $this->messageBus = $messageBus;
        $this->formFactory = $formFactory;
        $this->templating = $templating;
        $this->userQuery = $userQuery;
        $this->eventBus = $eventBus;
    }

    public function indexAction(Request $request)
    {
        $form = $this->formFactory->create(new RegisterType());

        return $this->templating->renderResponse(
          ':register:index.html.twig',
          array('form' => $form->createView())
        );
    }

    public function thanksAction(Request $request)
    {

        /**
         * Get the raw data from the request
         */
        $data = $request->request->get('register');

        /**
         * Create the register object
         */
        $register = new Register();

        $register->setFirstname($data['firstname']);

        $register->setSurname($data['surname']);

        /**
         * This is the message
         */
        $command = new RegisterUserCommand($register);

        $this->messageBus->handle($command);

        /**
         * Fire an event
         */
        $this->eventBus->handle($command);

        /**
         * query
         */
        $user = $this->userQuery->findByName($register->getFirstname(), $register->getSurname());

        return $this->templating->renderResponse(
          ':register:thanks.html.twig',
          array('user' => $user)
        );
    }
}
