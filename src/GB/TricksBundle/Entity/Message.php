<?php

namespace GB\TricksBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="GB\TricksBundle\Repository\MessageRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Message
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     * @Assert\NotBlank()
     */
    private $content;

    /**
     *
     * @ORM\ManyToOne(targetEntity="GB\TricksBundle\Entity\Trick",
     * inversedBy="messages")
     * @ORM\JoinColumn(name="trick_id", referencedColumnName="id")
     */
    private $trick;
    
    /**
     * @ORM\ManyToOne(targetEntity="GB\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
    */
    private $user;
    
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Message
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Message
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set trick
     *
     * @param \GB\TricksBundle\Entity\Trick $trick
     *
     * @return Message
     */
    public function setTrick(\GB\TricksBundle\Entity\Trick $trick)
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
    
    /**
     * @ORM\PrePersist()
     */
    public function setToday(){
        $this->date = new \DateTime();
    }

    /**
     * Set user
     *
     * @param \GB\UserBundle\Entity\User $user
     *
     * @return Message
     */
    public function setUser(\GB\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \GB\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
