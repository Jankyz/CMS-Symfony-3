<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * user
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     *
     * @Assert\NotBlank(
     *     message="Imię nie może być puste."
     * )
     * @Assert\Length(
     *     min=2,
     *     max=255,
     *     minMessage="Imię powinno być dłuższe niż 1 znak.",
     *     maxMessage="Imię nie może być dłuższe niż 255 znaków."
     * )
     *
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     *
     * @Assert\NotBlank(
     *     message="Nazwisko nie może być puste."
     * )
     * @Assert\Length(
     *     min=2,
     *     max=255,
     *     minMessage="Nazwisko powinno być dłuższe niż 1 znak.",
     *     maxMessage="Nazwisko nie może być dłuższe niż 255 znaków."
     * )
     *
     */
    private $surname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="datetime")
     *
     * @Assert\Date(
     *     message="Data urodzenia jest w niepoprawnym formacie."
     * )
     *
     */
    private $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=255)
     *
     * @Assert\NotBlank(
     *     message="Stanowisko nie może być puste."
     * )
     * @Assert\Length(
     *     min=2,
     *     max=255,
     *     minMessage="Stanowisko powinno być dłuższe niż 1 znak.",
     *     maxMessage="Stanowisko nie może być dłuższe niż 255 znaków."
     * )
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, unique=true)
     *
     * @Assert\NotBlank(
     *     message="Email nie może być pusty."
     * )
     * @Assert\Email(
     *     message = "Podany email '{{ value }}' nie jest poprawny.",
     *     checkMX = true
     * )
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, unique=true)
     *
     * @Assert\NotBlank(
     *     message="Login nie może być puste."
     * )
     * @Assert\Length(
     *     min=3,
     *     max=15,
     *     minMessage="Login powinien być dłuższy niż 2 znaki.",
     *     maxMessage="Login nie może być dłuższy niż 15 znaków."
     * )
     * @Assert\Regex(
     *     "/(^[a-zA-Z]+$)/",
     *     message="Login może składać się tylko z małych i wielkich liter."
     * )
     *
     */
    private $username;

    /**
     *
     * @Assert\NotBlank(
     *     message="Hasło nie może być puste. Powinno zawierać od 8 do 20 znaków."
     * )
     * @Assert\Length(
     *     min=8,
     *     max=20,
     *     minMessage="Hasło powinno zawierać co najmniej 8 znaków.",
     *     maxMessage="Hasło nie powinno zawierać więcej niż 20 znaków."
     * )
     *
     */
    private $plainPassword;

    /**
     *
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="array")
     */
    private $roles;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->roles = array('ROLE_USER');
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registeredAt", type="datetime")
     */
    private $registeredAt;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return user
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return user
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthDate
     *
     * @return $this
     */
    public function setBirthdate(\DateTime $birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthDate;
    }

    /**
     * Set position
     *
     * @param string $position
     *
     * @return user
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return user
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param $password
     */
    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Set registeredAt
     *
     * @param \DateTime $registeredAt
     *
     * @return $this
     */
    public function setRegisteredAt(\DateTime $registeredAt)
    {
        $this->registeredAt = $registeredAt;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Get registeredAt
     *
     * @return \DateTime
     */
    public function getRegisteredAt()
    {
        return $this->registeredAt;
    }

    /**
     * @return null|string
     */
    public function getSalt()
    {
        return null;
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            ) = unserialize($serialized);
    }

    /**
     *
     */
    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }
}

