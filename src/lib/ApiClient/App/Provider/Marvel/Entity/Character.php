<?php declare(strict_types=1);
/**
 *  Class representing Marvel characters
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-10
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\ApiClient\App\Provider\Marvel\Entity;

class Character
{
    /** 
     * Internal and external (tak   en from API) ID 
     */
    private int $id, $marvelId;

    /**
     * Character properties
     *
     * @var string
     */
    private string $apiName, $privName, $charName, $thumbUri, $description;

    /**
     * Interceptor function (to be used internally by \Pdo)
     *
     * @param string $name  
     * @param mixed $value
     * @return void
     */
    public function __set(string $name, mixed $value): void
    {
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

            case 'api_name':
                $this->apiName = $value;
                break;

            case 'description':
                $this->description = $value;
                break;

            case 'priv_name':
                $this->privName = $value;
                break;

            case 'char_name':
                $this->charName = $value;
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
    public function getApiName()
    {
        return $this->apiName;
    }

    /**
     * Set the value of apiName
     */
    public function setApiName($apiName): self
    {
        $this->apiName = $apiName;

        return $this;
    }

    /**
     * Get the value of privName
     */
    public function getPrivName()
    {
        return $this->privName;
    }

    /**
     * Set the value of privName
     */
    public function setPrivName($privName): self
    {
        $this->privName = $privName;

        return $this;
    }

    /**
     * Get the value of charName
     */
    public function getCharName()
    {
        return $this->charName;
    }

    /**
     * Set the value of charName
     */
    public function setCharName($charName): self
    {
        $this->charName = $charName;

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

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }
}
