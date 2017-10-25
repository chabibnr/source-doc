<?php

namespace App;
class A{
    const STATUS_PUBLISH = 1;
    const STATUS_DELETE = 2;

    private static $static_private = 1;
    protected static $static_protected = 1;
    public static $static_public = 1;


}

/**
 * Ini adalah ringkasan
 *
 * Lorem Ipsum is simply dummy text of the printing and typesetting industry.
 * Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
 * when an unknown printer took a galley of type and scrambled it to make a type specimen book.
 * It has `survived not only five centuries`, but also the leap into electronic typesetting,
 * remaining essentially unchanged.
 * It was popularised in the 1960s with the release of `Letraset sheets containing` Lorem Ipsum passages,
 * and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
 *
 * @author Chabib Nurozak <chabibnurozak@gmail.com>
 * @since 1.0
 */


class Main extends A{


    private $property_private = 1;
    protected $property_protected = 1;
    public $property_public = 1;



	/**
     * Ringkasan dari Method
     *
     * Sebuah deskripsi untuk method
     *
     * @author Chabib Nurozak <chabibnurozak@gmail.com>
     *
     * @since 2.0
     * @version 3.0
	 * @param \User $user
	 * @param int $id
	 * @return String | Array | \App\Main
	 */
	public function read($user, $id){
		return[];
	}

    /**
     * Class autoload loader.
     *
     * This method is invoked automatically when PHP sees an unknown class.
     * The method will attempt to include the class file according to the following procedure:
     *
     * 1. Search in [[classMap]];
     * 2. If the class is namespaced (e.g. `yii\base\Component`), it will attempt
     *    to include the file associated with the corresponding path alias
     *    (e.g. `@yii/base/Component.php`);
     *
     * This autoloader allows loading classes that follow the [PSR-4 standard](http://www.php-fig.org/psr/psr-4/)
     * and have its top-level namespace or sub-namespaces defined as path aliases.
     *
     * Example: When aliases `@yii` and `@yii/bootstrap` are defined, classes in the `yii\bootstrap` namespace
     * will be loaded using the `@yii/bootstrap` alias which points to the directory where bootstrap extension
     * files are installed and all classes from other `yii` namespaces will be loaded from the yii framework directory.
     *
     * Also the [guide section on autoloading](guide:concept-autoloading).
     *
     * @param string $className the fully qualified class name without a leading backslash "\"
     * @throws UnknownClassException if the class does not exist in the class file
     */
    public static function autoload($className)
    {
        if (isset(static::$classMap[$className])) {
            $classFile = static::$classMap[$className];
            if ($classFile[0] === '@') {
                $classFile = static::getAlias($classFile);
            }
        } elseif (strpos($className, '\\') !== false) {
            $classFile = static::getAlias('@' . str_replace('\\', '/', $className) . '.php', false);
            if ($classFile === false || !is_file($classFile)) {
                return;
            }
        } else {
            return;
        }
        include $classFile;
        if (YII_DEBUG && !class_exists($className, false) && !interface_exists($className, false) && !trait_exists($className, false)) {
            throw new UnknownClassException("Unable to find '$className' in file: $classFile. Namespace missing?");
        }
    }

}