<?php

namespace App\Events;

use App\Entity\AddressBook;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/*
 * AddressBook.create event is dispatched on reuest to create an Address
 */

class AddressBookEvent extends Event
{
    const NAME = 'AddressBook.create';

    protected $addressBook;

    /**
     * AddressBookEvent constructor.
     * @param $addressBook
     */
    public function __construct(AddressBook $addressBook)
    {
        $this->addressBook = $addressBook;
    }

    /**
     * @return mixed
     */
    public function getAddressBook()
    {
        return $this->addressBook;
    }

    public function saveAddressBook(UploadedFile $uPf, EntityManagerInterface $eM)
    {
        $file_name = rand( 1000000,9999999).'.jpeg';
        try {
            $uPf->move('../public/media/images/', $file_name );
        } catch (FileException $e ){
        }
        $this->addressBook->setPicture( $file_name );
        $eM->persist($this->addressBook);
        $eM->flush();
    }

    public function removeAddressBook(EntityManagerInterface $eM){

        if( file_exists("../public/media/images/".$this->addressBook->getPicture() ) ){
            unlink('../public/media/images/'.$this->addressBook->getPicture() );
        }
        $eM->remove($this->addressBook);
        $eM->flush();
    }

}
