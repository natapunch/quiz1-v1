<?php
use Model\AbstractPost;
use Exceptions\ClassNotFoundException;
use Exceptions\InvalidPostKeyException;

/**
 *Fabric
 * class PostCreator
 */
class PostCreator
{
    public static $instance = null;
    public $options = [];

    /**
     * @return null|PostCreator
     */
    public static function getInstance():self
    {
        if (null === self::$instance) {
            //Объект создается в первый раз
            self::$instance = new self();
        }
        // если уже существует, создается ссылка на него же
        return self::$instance;
    }

    /**
     *Для того чтобы нельзя было клонировать
     */
    public function __clone()
   {

   }

    /**
     * @param string $className
     * @param array $options
     * @return AbstractPost
     * @throws ClassNotFoundException
     * @throws InvalidPostKeyException
     */
    static function make (string $className, array $options): Model\AbstractPost
    {
        $namespacePaths = include 'config.php';
        if (array_key_exists($className, $namespacePaths)) {
            if (class_exists($namespacePaths[$className])) {
                return new $namespacePaths[$className]($options);
            } else {
                throw new ClassNotFoundException("Class " . $className . " is not found!");
            }
        } else {
            throw new InvalidPostKeyException("Key " . $className . " is incorrect!");
        }
    }
}