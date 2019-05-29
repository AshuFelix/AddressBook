<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\AddressBookInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AddressBookRepository")
 */
class AddressBook implements AddressBookInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $Firstname;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $Lastname;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $Street;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $Streetnumber;

    /**
     * @ORM\Column(type="integer")
     */
    private $Zip;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $City;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $Country;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $Phonenumber;

    /**
     * @ORM\Column(type="string",  length=10)
     */
    private $Birthday;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $Picture;

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstname(): string
    {
        return (string) $this->Firstname;
    }

    public function setFirstname(string $Firstname): AddressBookInterface
    {
        $this->Firstname = $Firstname;

        return $this;
    }

    public function getLastname(): string
    {
        return (string) $this->Lastname;
    }

    public function setLastname(string $Lastname): AddressBookInterface
    {
        $this->Lastname = $Lastname;

        return $this;
    }

    public function getStreet(): string
    {
        return (string) $this->Street;
    }

    public function setStreet(string $Street): AddressBookInterface
    {
        $this->Street = $Street;

        return $this;
    }

    public function getStreetnumber(): string
    {
        return (string) $this->Streetnumber;
    }

    public function setStreetnumber(string $Streetnumber): AddressBookInterface
    {
        $this->Streetnumber = $Streetnumber;

        return $this;
    }

    public function getZip(): int
    {
        return (int) $this->Zip;
    }

    public function setZip(int $Zip): AddressBookInterface
    {
        $this->Zip = $Zip;

        return $this;
    }

    public function getCity(): string
    {
        return (string) $this->City;
    }

    public function setCity(string $City): AddressBookInterface
    {
        $this->City = $City;

        return $this;
    }

    public function getCountry(): string
    {
        return (string) $this->Country;
    }

    public function setCountry(string $Country): AddressBookInterface
    {
        $this->Country = $Country;

        return $this;
    }

    public function getPhonenumber(): string
    {
        return (string) $this->Phonenumber;
    }

    public function setPhonenumber(string $Phonenumber): AddressBookInterface
    {
        $this->Phonenumber = $Phonenumber;

        return $this;
    }

    public function getBirthday(): string  // \DateTimeInterface
    {
        return ( string ) $this->Birthday;
    }

    public function setBirthday(string $Birthday): AddressBookInterface
    {
        $this->Birthday = $Birthday;

        return $this;
    }

    public function getEmail(): string
    {
        return (string) $this->Email;
    }

    public function setEmail(string $Email): AddressBookInterface
    {
        $this->Email = $Email;

        return $this;
    }

    public function getPicture(): string
    {
        return (string) $this->Picture;
    }

    public function setPicture(string $Picture): AddressBookInterface
    {
        $this->Picture = $Picture;

        return $this;
    }
}
