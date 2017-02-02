<?php
use Exceptions\ClassNotFoundException;
use Exceptions\InvalidPostKeyException;
use Model\Renderable;

require_once 'Autoloader.php';

try {
    $postCreator = PostCreator::getInstance();
    $blogPost2 = $postCreator->make(
        'BlogPost',
        [
            'title' => 'Behavior rules in blog',
            'content' => 'Be polite.',
            'author' => 'admin'
        ]
    );
    $blogPost1 = $postCreator->make(
        'BlogPost',
        [
            'title' => 'My first blog post!',
            'content' => 'Hello world!',
            'author' => 'artiomtb'
        ]
    );
    $newsPost = $postCreator->make(
        'NewsPost',
        [
            'title' => 'Breaking news',
            'content' => 'Illegal academic cheating!'
        ]
    );

    $posts = [$blogPost1, $blogPost2, $newsPost];
} catch (ClassNotFoundException $e) {
    die($e->getMessage());
} catch (InvalidPostKeyException $e) {
    die($e->getMessage());
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Variant 1 | Quiz 1</title>
</head>
<body>
<h3>Here are all posts:</h3>
<?php
foreach ($posts as $post) {
    if ($post instanceof Renderable) {
        echo $post->render() . '<br>';
    }
}
?>

</body>
</html>