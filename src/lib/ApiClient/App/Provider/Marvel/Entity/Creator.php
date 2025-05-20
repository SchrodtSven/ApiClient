<?php declare(strict_types=1);
/**
 *  Class representing Marvel creatos
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-11
 * @link https://github.com/SchrodtSven/ApiClient
 */

 namespace SchrodtSven\ApiClient\App\Provider\Marvel\Entity;

class Creator
{
    /** 
     * Internal and external (from API) ID 
     */
    private int $id, $marvelId;

    /**
     * Character properties
     *
     * @var string
     */
    private string $firstName;
    private string $midName;
    private string $lastName;
    private string $suffix;
    private string $fullName;
    private string $modified;
    private string $thumbUri;

    /**
     * Interceptor function (to be used internally by \Pdo*)
     *
     * @param string $name  
     * @param mixed $value
     * @return void
     */
    public function __set(string $name, mixed $value): void
    {
        if(is_null($value) || empty($value)) {
            $value = '';
        }
            
        switch ($name) {

            case 'marvel_id':
                $this->marvelId = $value;
                break;

            case 'id':
                $this->id = $value;
                break;

            case 'thumb_uri':
                $this->thumbUri = $value;
                break;

            case 'first_name':
                $this->firstName = $value;
                break;

            case 'suffix':
                $this->suffix = $value;
                break;

            case 'mid_name':
                $this->midName = $value;
                break;

            case 'last_name':
                $this->lastName = $value;
                break;
                
            case 'full_name':
                    $this->fullName = $value;
                    break;
        }
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    

    /**
     * Get the value of marvelId
     */
    public function getMarvelId()
    {
        return $this->marvelId;
    }

    /**
     * Set the value of marvelId
     */
    public function setMarvelId($marvelId): self
    {
        $this->marvelId = $marvelId;

        return $this;
    }

    /**
     * Get the value of apiName
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * Set the value of apiName
     */
    public function setSuffix($suffix): self
    {
        $this->suffix = $suffix;

        return $this;
    }

    /**
     * Get the value of privName
     */
    public function getMidName()
    {
        return $this->midName;
    }

    /**
     * Set the value of privName
     */
    public function setMidName($midName): self
    {
        $this->privName = $midName;

        return $this;
    }

    /**
     * Get the value of charName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of charName
     */
    public function setFirstName($firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of charName
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set the value of charName
     */
    public function setFullName($fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get the value of thumbUri
     */
    public function getThumbUri()
    {
        return $this->thumbUri;
    }

    /**
     * Set the value of thumbUri
     */
    public function setThumbUri($thumbUri): self
    {
        $this->thumbUri = $thumbUri;

        return $this;
    }

}
