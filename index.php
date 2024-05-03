<?php

interface ProductInterface {
    public function getImage();
    public function getTitle();
    public function getPrice();
    public function getCategoryIcon();
    public function getProductType();
}

class Product implements ProductInterface {
    protected $image;
    protected $title;
    protected $price;
    protected $category;

    public function __construct($image, $title, $price, $category) {
        $this->image = $image;
        $this->title = $title;
        $this->price = $price;
        $this->category = $category;
    }

    public function getImage() {
        return $this->image;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getCategoryIcon() {
        return $this->category->getIcon();
    }

    public function getProductType() {
        return get_class($this);
    }
}

class Food extends Product {}

class Toy extends Product {}

class Accommodation extends Product {}

class Category {
    protected $icon;
    protected $name;

    public function __construct($icon, $name) {
        $this->icon = $icon;
        $this->name = $name;
    }

    public function getIcon() {
        return $this->icon;
    }

    public function getName() {
        return $this->name;
    }
}

class PetStore {
    protected $products = [];

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function displayProducts() {
        foreach ($this->products as $product) {
            echo '<div class="card">';
            echo '<img src="' . $product->getImage() . '" alt="' . $product->getTitle() . '">';
            echo '<h2>' . $product->getTitle() . '</h2>';
            echo '<p>Price: $' . $product->getPrice() . '</p>';
            echo '<p><i class="' . $product->getCategoryIcon() . '"></i> ' . $product->getProductType() . '</p>';
            echo '</div>';
        }
    }
}

$petStore = new PetStore();

$petStore->addProduct(new Food('img/dog-food.jpg', 'Dog Food', 20, new Category('🐶', 'Dogs')));
$petStore->addProduct(new Toy('img/ball.jpg', 'Ball', 5, new Category('🐶', 'Dogs')));
$petStore->addProduct(new Accommodation('img/dog-house.jpg', 'Dog House', 100, new Category('🐶', 'Dogs')));

$petStore->addProduct(new Food('img/cat-food.jpg', 'Cat Food', 15, new Category('🐱', 'Cats')));
$petStore->addProduct(new Toy('img/mouse.jpg', 'Mouse', 3, new Category('🐱', 'Cats')));
$petStore->addProduct(new Accommodation('img/tower.jpg', 'Cat Tower', 75, new Category('🐱', 'Cats')));

$petStore->displayProducts();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.css' integrity='sha512-VcyUgkobcyhqQl74HS1TcTMnLEfdfX6BbjhH8ZBjFU9YTwHwtoRtWSGzhpDVEJqtMlvLM2z3JIixUOu63PNCYQ==' crossorigin='anonymous'/>
  <!-- css link -->
  <link rel="stylesheet" href="./css/style.css">
  <title>OOP 2</title>
</head>
<body>
  
  <?php foreach ($products as $product) {?>
    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="<?php echo $product->image;?>" alt="<?php echo $product->title;?>">
      <div class="card-body">
        <h5 class="card-title"><?php echo $product->title;?></h5>
        <p class="card-text">Price: $<?php echo $product->price;?></p>
        <p class="card-text">Category: <?php echo $product->category->name;?></p>
        <p class="card-text">Type: <?php echo $product->type;?></p>
      </div>
    </div>
  <?php }?>
  
</body>
</html>