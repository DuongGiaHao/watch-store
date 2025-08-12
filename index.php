<?php
session_start();
include 'header.php';
?>

  <!--page loader-->

  <!--end loader-->

  <!--end top header-->


  <!--start page content-->
  <div class="page-content">
    

    <!--start carousel-->
    <section class="slider-section">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active bg-primary">
            <div class="row d-flex align-items-center">
              <div class="col d-none d-lg-flex justify-content-center">
                <div class="">
                  <h3 class="h3 fw-light text-white fw-bold">Trending Timepieces</h3>
                  <h1 class="h1 text-white fw-bold">Luxury Men's Watches</h1>
                  <p class="text-white fw-bold"><i>Final Call – Save Up to 35%</i></p>
                  <div class=""><a class="btn btn-dark btn-ecomm" href="shop-grid.html">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <img src="assets/images/sliders/s_1.jpg" class="img-fluid" alt="...">
              </div>
            </div>
          </div>
          <div class="carousel-item bg-red">
            <div class="row d-flex align-items-center">
              <div class="col d-none d-lg-flex justify-content-center">
                <div class="">
                  <h3 class="h3 fw-light text-white fw-bold">Hot Right Now</h3>
                  <h1 class="h1 text-white fw-bold">Performance Men’s Watches</h1>
                  <p class="text-white fw-bold"><i>Gear Up – Up to 35% Off</i></p>
                  <div class=""> <a class="btn btn-dark btn-ecomm" href="shop-grid.html">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <img src="assets/images/sliders/s_2.jpg" class="img-fluid" alt="...">
              </div>
            </div>
          </div>
          <div class="carousel-item bg-purple">
            <div class="row d-flex align-items-center">
              <div class="col d-none d-lg-flex justify-content-center">
                <div class="">
                  <h3 class="h3 fw-light text-white fw-bold">Latest Masterpieces</h3>
                  <h1 class="h1 text-white fw-bold">Swiss-Inspired Designs</h1>
                  <p class="text-white fw-bold"><i>Limited Offer – Up to 35% Off</i></p>
                  <div class=""><a class="btn btn-dark btn-ecomm" href="shop-grid.html">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <img src="assets/images/sliders/s_3.jpg" class="img-fluid" alt="...">
              </div>
            </div>
          </div>
          <div class="carousel-item bg-yellow">
            <div class="row d-flex align-items-center">
              <div class="col d-none d-lg-flex justify-content-center">
                <div class="">
                  <h3 class="h3 fw-light text-dark fw-bold">This Week’s Must-Haves</h3>
                  <h1 class="h1 text-dark fw-bold">Stylish Men’s Timepieces</h1>
                  <p class="text-dark fw-bold"><i>Hurry – 35% Off Ends Soon</i></p>
                  <div class=""><a class="btn btn-dark btn-ecomm" href="shop-grid.html">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <img src="assets/images/sliders/s_4.jpg" class="img-fluid" alt="...">
              </div>
            </div>
          </div>
          <div class="carousel-item bg-green">
            <div class="row d-flex align-items-center">
              <div class="col d-none d-lg-flex justify-content-center">
                <div class="">
                  <h3 class="h3 fw-light text-white fw-bold">Bestsellers This Season</h3>
                  <h1 class="h1 text-white fw-bold">Premium Men’s Collections</h1>
                  <p class="text-white fw-bold"><i>Exclusive Deal – Save 35%</i></p>
                  <div class=""><a class="btn btn-dark btn-ecomm" href="shop-grid.html">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <img src="assets/images/sliders/s_5.jpg" class="img-fluid" alt="...">
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
    <!--end carousel-->


    <!--start Featured Products slider-->
    <section class="section-padding">
      <div class="container">
        <div class="text-center pb-3">
          <h3 class="mb-0 h3 fw-bold">Featured Products</h3>
          <p class="mb-0 text-capitalize">The purpose of lorem ipsum</p>
        </div>
        <div class="product-thumbs">
          <?php
          require_once __DIR__ . '/config/database.php';
          $stmt = $pdo->query('SELECT * FROM products ORDER BY created_at DESC LIMIT 8');
          $products = $stmt->fetchAll();
          foreach ($products as $p):
          ?>
          <div class="card">
            <div class="position-relative overflow-hidden">
              <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                <a href="javascript:;"><i class="bi bi-heart"></i></a>
                <button type="button" class="btn btn-sm btn-dark add-to-cart-btn" data-id="<?= $p['id'] ?>"><i class="bi bi-basket3"></i></button>
              </div>
              <a href="product-details.php?id=<?= $p['id'] ?>">
                <?php if ($p['thumbnail']): ?>
                  <img src="assets/images/product-images/<?= htmlspecialchars($p['thumbnail']) ?>" class="card-img-top" alt="<?= htmlspecialchars($p['name']) ?>" style="object-fit:cover; height:220px; width:100%;">
                <?php else: ?>
                  <img src="assets/images/no-image.png" class="card-img-top" alt="No image" style="object-fit:cover; height:220px; width:100%;">
                <?php endif; ?>
              </a>
            </div>
            <div class="card-body">
              <div class="product-info text-center">
                <h6 class="mb-1 fw-bold product-name"><?= htmlspecialchars($p['name']) ?></h6>
                <div class="ratings mb-1 h6">
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                </div>
                <p class="mb-0 h6 fw-bold product-price">$<?= number_format($p['price'], 2, ',', '.') ?></p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <!--end Featured Products slider-->


    <!--start tabular product-->
    <section class="product-tab-section section-padding bg-light">
      <div class="container">
        <div class="text-center pb-3">
          <h3 class="mb-0 h3 fw-bold">Latest Products</h3>
          <p class="mb-0 text-capitalize">The purpose of lorem ipsum</p>
        </div>
        <div class="row">
          <div class="col-auto mx-auto">
            <div class="product-tab-menu table-responsive">
              <ul class="nav nav-pills flex-nowrap" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#new-arrival" type="button">New
                    Arrival</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" data-bs-toggle="pill" data-bs-target="#best-sellar" type="button">Best
                    Sellar</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" data-bs-toggle="pill" data-bs-target="#trending-product"
                    type="button">Trending</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" data-bs-toggle="pill" data-bs-target="#special-offer" type="button">Special
                    Offer</button>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <hr>
        <div class="tab-content tabular-product">
          <div class="tab-pane fade show active" id="new-arrival">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-4">
              <?php
              require_once __DIR__ . '/config/database.php';
              $stmt = $pdo->query('SELECT * FROM products ORDER BY created_at DESC LIMIT 20');
              $products = $stmt->fetchAll();
              foreach ($products as $p):
              ?>
              <div class="col">
                <div class="card">
                  <div class="position-relative overflow-hidden">
                    <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                      <a href="javascript:;"><i class="bi bi-heart"></i></a>
                      <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                    </div>
                    <a href="product-details.php?id=<?= $p['id'] ?>">
                      <?php if ($p['thumbnail']): ?>
                        <img src="assets/images/product-images/<?= htmlspecialchars($p['thumbnail']) ?>" class="card-img-top" alt="<?= htmlspecialchars($p['name']) ?>" style="object-fit:cover; height:200px; width:100%;">
                      <?php else: ?>
                        <img src="assets/images/no-image.png" class="card-img-top" alt="No image" style="object-fit:cover; height:200px; width:100%;">
                      <?php endif; ?>
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="product-info text-center">
                      <h6 class="mb-1 fw-bold product-name" title="<?= htmlspecialchars($p['name']) ?>">
                        <?= mb_strimwidth(htmlspecialchars($p['name']), 0, 40, '...') ?>
                      </h6>
                      <div class="ratings mb-1 h6">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                      </div>
                      <p class="mb-0 h6 fw-bold product-price">$<?= number_format($p['price'], 2, ',', '.') ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="tab-pane fade" id="best-sellar">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-4">
              <?php
              require_once __DIR__ . '/config/database.php';
              $stmt = $pdo->prepare('SELECT * FROM products WHERE price < 200 ORDER BY price ASC LIMIT 20');
              $products = $stmt->execute() ? $stmt->fetchAll() : [];
              foreach ($products as $p):
              ?>
              <div class="col">
                <div class="card">
                  <div class="position-relative overflow-hidden">
                    <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                      <a href="javascript:;"><i class="bi bi-heart"></i></a>
                      <button type="button" class="btn btn-sm btn-dark add-to-cart-btn" data-id="<?= $p['id'] ?>"><i class="bi bi-basket3"></i></button>
                    </div>
                    <a href="product-details.php?id=<?= $p['id'] ?>">
                      <?php if ($p['thumbnail']): ?>
                        <img src="assets/images/product-images/<?= htmlspecialchars($p['thumbnail']) ?>" class="card-img-top" alt="<?= htmlspecialchars($p['name']) ?>" style="object-fit:cover; height:200px; width:100%;">
                      <?php else: ?>
                        <img src="assets/images/no-image.png" class="card-img-top" alt="No image" style="object-fit:cover; height:200px; width:100%;">
                      <?php endif; ?>
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="product-info text-center">
                      <h6 class="mb-1 fw-bold product-name" title="<?= htmlspecialchars($p['name']) ?>">
                        <?= mb_strimwidth(htmlspecialchars($p['name']), 0, 40, '...') ?>
                      </h6>
                      <div class="ratings mb-1 h6">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                      </div>
                      <p class="mb-0 h6 fw-bold product-price">$<?= number_format($p['price'], 2, ',', '.') ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="tab-pane fade" id="trending-product">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-4">
              <?php
              require_once __DIR__ . '/config/database.php';
              $stmt = $pdo->prepare('SELECT p.* FROM products p JOIN categories c ON p.category_id = c.id WHERE c.name = ? ORDER BY p.created_at DESC LIMIT 20');
              $stmt->execute(['classic']);
              $products = $stmt->fetchAll();
              foreach ($products as $p):
              ?>
              <div class="col">
                <div class="card">
                  <div class="position-relative overflow-hidden">
                    <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                      <a href="javascript:;"><i class="bi bi-heart"></i></a>
                      <button type="button" class="btn btn-sm btn-dark add-to-cart-btn" data-id="<?= $p['id'] ?>"><i class="bi bi-basket3"></i></button>
                    </div>
                    <a href="product-details.php?id=<?= $p['id'] ?>">
                      <?php if ($p['thumbnail']): ?>
                        <img src="assets/images/product-images/<?= htmlspecialchars($p['thumbnail']) ?>" class="card-img-top" alt="<?= htmlspecialchars($p['name']) ?>" style="object-fit:cover; height:200px; width:100%;">
                      <?php else: ?>
                        <img src="assets/images/no-image.png" class="card-img-top" alt="No image" style="object-fit:cover; height:200px; width:100%;">
                      <?php endif; ?>
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="product-info text-center">
                      <h6 class="mb-1 fw-bold product-name" title="<?= htmlspecialchars($p['name']) ?>">
                        <?= mb_strimwidth(htmlspecialchars($p['name']), 0, 40, '...') ?>
                      </h6>
                      <div class="ratings mb-1 h6">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                      </div>
                      <p class="mb-0 h6 fw-bold product-price">$<?= number_format($p['price'], 2, ',', '.') ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="tab-pane fade" id="special-offer">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-4">
              <?php
              require_once __DIR__ . '/config/database.php';
              $stmt = $pdo->prepare('SELECT p.* FROM products p JOIN categories c ON p.category_id = c.id WHERE c.name = ? ORDER BY p.created_at DESC LIMIT 20');
              $stmt->execute(['high-class']);
              $products = $stmt->fetchAll();
              foreach ($products as $p):
              ?>
              <div class="col">
                <div class="card">
                  <div class="position-relative overflow-hidden">
                    <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                      <a href="javascript:;"><i class="bi bi-heart"></i></a>
                      <button type="button" class="btn btn-sm btn-dark add-to-cart-btn" data-id="<?= $p['id'] ?>"><i class="bi bi-basket3"></i></button>
                    </div>
                    <a href="product-details.php?id=<?= $p['id'] ?>">
                      <?php if ($p['thumbnail']): ?>
                        <img src="assets/images/product-images/<?= htmlspecialchars($p['thumbnail']) ?>" class="card-img-top" alt="<?= htmlspecialchars($p['name']) ?>" style="object-fit:cover; height:200px; width:100%;">
                      <?php else: ?>
                        <img src="assets/images/no-image.png" class="card-img-top" alt="No image" style="object-fit:cover; height:200px; width:100%;">
                      <?php endif; ?>
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="product-info text-center">
                      <h6 class="mb-1 fw-bold product-name" title="<?= htmlspecialchars($p['name']) ?>">
                        <?= mb_strimwidth(htmlspecialchars($p['name']), 0, 40, '...') ?>
                      </h6>
                      <div class="ratings mb-1 h6">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                      </div>
                      <p class="mb-0 h6 fw-bold product-price">$<?= number_format($p['price'], 2, ',', '.') ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--end tabular product-->


    <!--start features-->
    <section class="product-thumb-slider section-padding">
      <div class="container">
        <div class="text-center pb-3">
          <h3 class="mb-0 h3 fw-bold">What We Offer!</h3>
          <p class="mb-0 text-capitalize">The purpose of lorem ipsum</p>
        </div>
        <div class="row row-cols-1 row-cols-lg-4 g-4">
          <div class="col d-flex">
            <div class="card depth border-0 rounded-0 border-bottom border-primary border-3 w-100">
              <div class="card-body text-center">
                <div class="h1 fw-bold my-2 text-primary">
                  <i class="bi bi-truck"></i>
                </div>
                <h5 class="fw-bold">Free Delivery</h5>
                <p class="mb-0">Nor again is there anyone who loves or pursues or desires to obtain pain of itself.</p>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card depth border-0 rounded-0 border-bottom border-danger border-3 w-100">
              <div class="card-body text-center">
                <div class="h1 fw-bold my-2 text-danger">
                  <i class="bi bi-credit-card"></i>
                </div>
                <h5 class="fw-bold">Secure Payment</h5>
                <p class="mb-0">Nor again is there anyone who loves or pursues or desires to obtain pain of itself.</p>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card depth border-0 rounded-0 border-bottom border-success border-3 w-100">
              <div class="card-body text-center">
                <div class="h1 fw-bold my-2 text-success">
                  <i class="bi bi-minecart-loaded"></i>
                </div>
                <h5 class="fw-bold">Free Returns</h5>
                <p class="mb-0">Nor again is there anyone who loves or pursues or desires to obtain pain of itself.</p>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card depth border-0 rounded-0 border-bottom border-warning border-3 w-100">
              <div class="card-body text-center">
                <div class="h1 fw-bold my-2 text-warning">
                  <i class="bi bi-headset"></i>
                </div>
                <h5 class="fw-bold">24/7 Support</h5>
                <p class="mb-0">Nor again is there anyone who loves or pursues or desires to obtain pain of itself.</p>
              </div>
            </div>
          </div>
        </div>
        <!--end row-->
      </div>
    </section>
    <!--end features-->


    <!--start special product-->
    <section class="section-padding bg-section-2">
      <div class="container">
        <div class="card border-0 rounded-0 p-3 depth">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="assets/images/extra-images/new_01.png" class="img-fluid rounded-0" alt="...">
            </div>
            <div class="col-lg-6">
              <div class="card-body">
                <h3 class="fw-bold">New Features of Trending Timepieces</h3>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item bg-transparent px-0">Contrary to popular belief, a great watch is more than just a way to tell time — it’s a statement of style and precision.</li>
                  <li class="list-group-item bg-transparent px-0">Our latest men’s watch collections combine timeless craftsmanship with innovative features, from scratch-resistant sapphire glass to automatic movement and water resistance.</li>
                  <li class="list-group-item bg-transparent px-0">Each timepiece is designed to deliver lasting performance while complementing your unique look.</li>
                  <li class="list-group-item bg-transparent px-0">Discover the collection that defines the modern gentleman.</li>
                </ul>
                <div class="buttons mt-4 d-flex flex-column flex-lg-row gap-3">
                  <a href="javascript:;" class="btn btn-lg btn-dark btn-ecomm px-5 py-3">Buy Now</a>
                  <a href="javascript:;" class="btn btn-lg btn-outline-dark btn-ecomm px-5 py-3">View Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--start special product-->


    <!--start Brands-->
    </section>
    <!--end Brands-->


    <!--start cartegory slider-->
    <section class="cartegory-slider section-padding bg-section-2">
      <div class="container">
        <div class="text-center pb-3">
          <h3 class="mb-0 h3 fw-bold">Top Categories</h3>
          <p class="mb-0 text-capitalize">Select your favorite categories and purchase</p>
        </div>
        <div class="cartegory-box">
          <?php
          require_once __DIR__ . '/config/database.php';
          $cat_stmt = $pdo->query('SELECT * FROM categories ORDER BY id DESC');
          $categories = $cat_stmt->fetchAll();
          foreach ($categories as $cat):
            // Đếm số sản phẩm thuộc danh mục này
            $count_stmt = $pdo->prepare('SELECT COUNT(*) FROM products WHERE category_id = ?');
            $count_stmt->execute([$cat['id']]);
            $product_count = $count_stmt->fetchColumn();
            // Ảnh danh mục
            $img = !empty($cat['image']) ? 'assets/images/categories/' . htmlspecialchars($cat['image']) : 'assets/images/categories/default.webp';
          ?>
          <a href="categories.php?id=<?= $cat['id'] ?>">
            <div class="card">
              <div class="card-body">
                <div class="overflow-hidden">
                  <img src="<?= $img ?>" class="card-img-top rounded-0" alt="<?= htmlspecialchars($cat['name']) ?>">
                </div>
                <div class="text-center">
                  <h5 class="mb-1 cartegory-name mt-3 fw-bold"><?= htmlspecialchars($cat['name']) ?></h5>
                  <h6 class="mb-0 product-number fw-bold"><?= $product_count ?> Products</h6>
                </div>
              </div>
            </div>
          </a>
          <?php endforeach; ?>

        </div>
      </div>
    </section>
    <!--end cartegory slider-->


    <!--subscribe banner-->
    <section class="product-thumb-slider subscribe-banner p-5">
      <div class="row">
        <div class="col-12 col-lg-6 mx-auto">
          <div class="text-center">
            <h3 class="mb-0 fw-bold text-white">Get Latest Update by <br> Subscribe Our Newslater</h3>
            <div class="mt-3">
              <input type="text" class="form-control form-control-lg bubscribe-control rounded-0 px-5 py-3"
                placeholder="Enter your email">
            </div>
            <div class="mt-3 d-grid">
              <button type="button" class="btn btn-lg btn-ecomm bubscribe-button px-5 py-3">Subscribe</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--subscribe banner-->


    <!--start blog-->
    <section class="section-padding">
      <div class="container">
        <div class="text-center pb-3">
          <h3 class="mb-0 fw-bold">Latest Blog</h3>
          <p class="mb-0 text-capitalize">Check our latest news</p>
        </div>
        <div class="blog-cards">
          <div class="row row-cols-1 row-cols-lg-3 g-4">
            <div class="col">
              <div class="card">
                <img src="assets/images/blog/blog_01.png" class="card-img-top rounded-0" alt="...">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-4">
                    <div class="posted-by">
                      <p class="mb-0"><i class="bi bi-person me-2"></i>Virendra</p>
                    </div>
                    <div class="posted-date">
                      <p class="mb-0"><i class="bi bi-calendar me-2"></i>15 Aug, 2022</p>
                    </div>
                  </div>
                  <h5 class="card-title fw-bold mt-3">Top 5 Trending Men’s Watches This Season</h5>
                  <p class="mb-0">Stay ahead of style with our curated list of the most sought-after designs in men’s timepieces.</p>
                  <a href="blog-read.html" class="btn btn-outline-dark btn-ecomm mt-3">Read More</a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <img src="assets/images/blog/blog_02.png" class="card-img-top rounded-0" alt="...">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-4">
                    <div class="posted-by">
                      <p class="mb-0"><i class="bi bi-person me-2"></i>Virendra</p>
                    </div>
                    <div class="posted-date">
                      <p class="mb-0"><i class="bi bi-calendar me-2"></i>15 Aug, 2022</p>
                    </div>
                  </div>
                  <h5 class="card-title fw-bold mt-3">How to Care for Your Luxury Watch</h5>
                  <p class="mb-0">Learn the essential tips and tricks to maintain your luxury watch and keep it looking brand new.</p>
                  <a href="blog-read.html" class="btn btn-outline-dark btn-ecomm mt-3">Read More</a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <img src="assets/images/blog/blog_03.png" class="card-img-top rounded-0" alt="...">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-4">
                    <div class="posted-by">
                      <p class="mb-0"><i class="bi bi-person me-2"></i>Virendra</p>
                    </div>
                    <div class="posted-date">
                      <p class="mb-0"><i class="bi bi-calendar me-2"></i>15 Aug, 2022</p>
                    </div>
                  </div>
                  <h5 class="card-title fw-bold mt-3">The Gentleman’s Guide to Choosing a Watch</h5>
                  <p class="mb-0">Discover how to select a timepiece that perfectly matches your lifestyle, from formal events to everyday wear.</p>
                  <a href="blog-read.html" class="btn btn-outline-dark btn-ecomm mt-3">Read More</a>
                </div>
              </div>
            </div>

          </div>
          <!--end row-->
        </div>
      </div>
    </section>
    <!--end blog-->


  </div>
  <!--end page content-->


<?php include 'footer.php'; ?>
<!-- Toastr JS & CSS -->
<link rel="stylesheet" href="assets/css/toastr.min.css">
<script src="assets/js/toastr.min.js"></script>
<script>
document.querySelectorAll('.add-to-cart-btn').forEach(function(btn) {
  btn.onclick = function() {
    var id = this.getAttribute('data-id');
    fetch('add_to_cart.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      body: 'id=' + id + '&qty=1'
    })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        toastr.success('Added to cart!');
      } else {
        toastr.error(data.message || 'Add to cart failed!');
      }
    });
  }
});
</script>
<?php if (!empty($_SESSION['login_success'])): ?>
      <script>
        toastr.success('Login successful!');
      </script>   
      <?php unset($_SESSION['login_success']); ?>
    <?php endif; ?>