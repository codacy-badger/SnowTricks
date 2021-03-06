<?php

namespace GB\TricksBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Video
 *
 * @ORM\Table(name="video")
 * @ORM\Entity(repositoryClass="GB\TricksBundle\Repository\VideoRepository")
 */
class Video
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
     * @ORM\Column(name="url", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $url;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="GB\TricksBundle\Entity\Trick",
     *  inversedBy="videos")
     * @ORM\JoinColumn(name="trick_id", referencedColumnName="id")
     */
    private $trick;

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
     * Set url
     *
     * @param string $url
     *
     * @return Video
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set trick
     *
     * @param \GB\TricksBundle\Entity\Trick $trick
     *
     * @return Video
     */
    public function setTrick(\GB\TricksBundle\Entity\Trick $trick = null)
    {
        $this->trick = $trick;

        return $this;
    }

    /**
     * Get trick
     *
     * @return \GB\TricksBundle\Entity\Trick
     */
    public function getTrick()
    {
        return $this->trick;
    }
    
    public function adjustUrl(){
        
    }
}
