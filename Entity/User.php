<?php
// src/UserBundle/Entity/User.php
namespace UserBundle\Entity;


use HireVoice\Neo4j\Annotation as OGM;
use Doctrine\Common\Collections\ArrayCollection;
use UserBundle\Node\User as BaseUser;

/**
 * @OGM\Entity(labels="User")
 */
class User extends BaseUser 
{
    /**
     * @OGM\Auto
     */
    protected $id;
    
    /**
     * @OGM\Property
     */
    protected $firstName;

    /**
     * @OGM\Property
     */
    protected $lastName;

    /**
     * @OGM\Property
     */
    protected $birthday;

    /**
     * @OGM\Property
     */
    protected $gender;

     /**
     * @OGM\Property
     * @OGM\Index
     */
    protected $hiveName;     
    
    
   
    // ----------------- GETTERS ------------------ //
   public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }
    
    public function getGender()
    {
        return $this->gender;
    }

    public function getHiveName()
    {
        return $this->hiveName;
    }

    
    // ----------------- SETTERS ------------------ //
    
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
   
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = time($birthday);
    }
    
    public function setGender($gender)
    {
        $this->gender = $gender;
    }    
    
    public function setHiveName($hiveName)
    {
        $this->hiveName = $hiveName;
    }     
        
    }