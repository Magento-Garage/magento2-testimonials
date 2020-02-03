<?php
/* 
 * @package MagentoGarage/Testimonials
 * @category Api
 * @author Aman Srivastava <http://amansrivastava.in>
 *
 */

namespace MagentoGarage\Testimonials\Api\Data;


interface TestimonialInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const TESTIMONIAL_ID = 'testimonial_id';
    const NAME         = 'name';
    const EMAIL         = 'email';
    const CONTENT       = 'content';
    const CREATION_TIME = 'creation_time';
    const UPDATE_TIME   = 'update_time';
    const IS_ACTIVE     = 'is_active';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get name
     *
     * @return string|null
     */
    public function getName();

    /**
     * Get email
     *
     * @return string|null
     */
    public function getEmail();

    /**
     * Get content
     *
     * @return string|null
     */
    public function getContent();

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime();

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdateTime();

    /**
     * Is active
     *
     * @return bool|null
     */
    public function isActive();

    /**
     * Set ID
     *
     * @param int $id
     * @return \MagentoGarage\Testimonials\Api\Data\TestimonialInterface
     */
    public function setId($id);

    /**
     * Set name
     *
     * @param string $name
     * @return \MagentoGarage\Testimonials\Api\Data\TestimonialInterface
     */
    public function setName($name);

    /**
     * Set email
     *
     * @param string $email
     * @return \MagentoGarage\Testimonials\Api\Data\TestimonialInterface
     */
    public function setEmail($email);

    /**
     * Set content
     *
     * @param string $content
     * @return \MagentoGarage\Testimonials\Api\Data\TestimonialInterface
     */
    public function setContent($content);

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return \MagentoGarage\Testimonials\Api\Data\TestimonialInterface
     */
    public function setCreationTime($creationTime);

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return \MagentoGarage\Testimonials\Api\Data\TestimonialInterface
     */
    public function setUpdateTime($updateTime);

    /**
     * Set is active
     *
     * @param int|bool $isActive
     * @return \MagentoGarage\Testimonials\Api\Data\TestimonialInterface
     */
    public function setIsActive($isActive);
}