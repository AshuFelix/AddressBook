<?php
/**
 * Created by PhpStorm.
 * User: Mary
 * Date: 5/29/2019
 * Time: 4:30 PM
 */

namespace App\Entity;


interface AddressBookInterface
{
    public function getId(): int ;

    public function getFirstname(): string ;

    public function setFirstname(string $Firstname): AddressBookInterface;

    public function getLastname(): string ;

    public function setLastname(string $Lastname): AddressBookInterface ;

    public function getStreet(): string ;

    public function setStreet(string $Street): AddressBookInterface;

    public function getStreetnumber(): string;

    public function setStreetnumber(string $Streetnumber): AddressBookInterface;

    public function getZip(): int;

    public function setZip(int $Zip): AddressBookInterface;

    public function getCity(): string ;

    public function setCity(string $City): AddressBookInterface;

    public function getCountry(): string ;

    public function setCountry(string $Country): AddressBookInterface;

    public function getPhonenumber(): string ;

    public function setPhonenumber(string $Phonenumber): AddressBookInterface;

    public function getBirthday(): string;

    public function setBirthday(string $Birthday): AddressBookInterface;

    public function getEmail(): string;

    public function setEmail(string $Email): AddressBookInterface ;

    public function getPicture(): string;

    public function setPicture(string $Picture): AddressBookInterface;

}