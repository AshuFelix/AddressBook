<?php

namespace App\Controller;

use App\Entity\AddressBook;
use App\Events\AddressBookEvent;
use App\Form\AddressBookType;
use App\Repository\AddressBookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/address/book")
 */
class AddressBookController extends AbstractController
{
    /**
     * @Route("/", name="address_book_index", methods={"GET"})
     */
    public function index(AddressBookRepository $addressBookRepository): Response
    {
        return $this->render('address_book/index.html.twig', [
            'address_books' => $addressBookRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="address_book_new", methods={"GET","POST"})
     */
    public function new_(Request $request, EventDispatcherInterface $dispatcher): Response
    {
        $addressBook = new AddressBook();
        $form = $this->createForm(AddressBookType::class, $addressBook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $event = new AddressBookEvent($addressBook);
            $dispatcher->dispatch($event::NAME, $event)
                       ->saveAddressBOOK($form['Picture']->getData(),
                                         $this->getDoctrine()->getManager() );

            return $this->redirectToRoute('address_book_index');
        }

        return $this->render('address_book/new.html.twig', [
            'address_book' => $addressBook,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="address_book_show", methods={"GET"})
     */
    public function show(AddressBook $addressBook): Response
    {
        return $this->render('address_book/show.html.twig', [
            'address_book' => $addressBook,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="address_book_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AddressBook $addressBook): Response
    {
        $form = $this->createForm(AddressBookType::class, $addressBook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('address_book_index', [
                'id' => $addressBook->getId(),
            ]);
        }

        return $this->render('address_book/edit.html.twig', [
            'address_book' => $addressBook,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="address_book_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AddressBook $addressBook, EventDispatcherInterface $dispatcher): Response
    {
        if ($this->isCsrfTokenValid('delete'.$addressBook->getId(), $request->request->get('_token'))) {
            $event = new AddressBookEvent($addressBook);
            $dispatcher->dispatch($event::NAME, $event)
                       ->removeAddressBOOK($this->getDoctrine()->getManager() );
        }

        return $this->redirectToRoute('address_book_index');
    }
}
