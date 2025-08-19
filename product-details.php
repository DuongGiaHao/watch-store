<?php
include 'header.php';
require_once __DIR__ . '/config/database.php';
// Lấy id sản phẩm từ GET
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
  echo '<div class="container py-5"><div class="alert alert-danger">Không tìm thấy sản phẩm!</div></div>';
  include 'footer.php';
  exit;
}
// Lấy thông tin sản phẩm
$stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
$stmt->execute([$id]);
$product = $stmt->fetch();
if (!$product) {
  echo '<div class="container py-5"><div class="alert alert-danger">No products found!</div></div>';
  include 'footer.php';
  exit;
}
// Lấy các ảnh phụ
$img_stmt = $pdo->prepare('SELECT image_url FROM product_images WHERE product_id = ?');
$img_stmt->execute([$id]);
$images = $img_stmt->fetchAll();
?>
<!--end top header-->


<!--start page content-->
<div class="page-content">


  <!--start breadcrumb-->
  <div class="py-4 border-bottom">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:;">Shop</a></li>
          <li class="breadcrumb-item active" aria-current="page">Page Details</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->


  <!--start product details-->
  <section class="py-4">
    <div class="container">
      <div class="row g-4">
        <div class="col-12 col-xl-7">
          <div class="product-images">
            <div class="product-zoom-images">
              <div class="row row-cols-2 g-3">
                <div class="col">
                  <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="assets/images/product-images/<?= htmlspecialchars($product['thumbnail']) ?>">
                    <img src="assets/images/product-images/<?= htmlspecialchars($product['thumbnail']) ?>" class="img-fluid" alt="Thumbnail">
                  </div>
                </div>
                <?php foreach ($images as $img): ?>
                <div class="col">
                  <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="assets/images/product-images/<?= htmlspecialchars($img['image_url']) ?>">
                    <img src="assets/images/product-images/<?= htmlspecialchars($img['image_url']) ?>" class="img-fluid" alt="Phụ">
                  </div>
                </div>
                <?php endforeach; ?>
              </div><!--end row-->
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-5">
          <div class="product-info">
            <h4 class="product-title fw-bold mb-1"><?= htmlspecialchars($product['name']) ?></h4>
            <p class="mb-0"><?= nl2br(htmlspecialchars($product['descriptions'])) ?></p>
            <hr>
            <div class="product-price d-flex align-items-center gap-3">
              <div class="h4 fw-bold">$<?= number_format($product['price'], 2, ',', '.') ?></div>
            </div>
            <p class="fw-bold mb-0 mt-1 text-success">Stock <?= $product['stock'] ?> Products</p>
            <div class="cart-buttons mt-3">
              <div class="buttons d-flex flex-column flex-lg-row gap-3 mt-4">
                <button type="button" id="addToCartBtn" class="btn btn-lg btn-dark btn-ecomm px-5 py-3 col-lg-6"><i class="bi bi-basket2 me-2"></i>Add to cart</button>
                <a href="javascript:;" class="btn btn-lg btn-outline-dark btn-ecomm px-5 py-3"><i class="bi bi-suit-heart me-2"></i>Add to Wishlist</a>
              </div>
            </div>
            <hr class="my-3">
            <div class="product-info">
              <h6 class="fw-bold mb-3">Products Details</h6>
              <p class="mb-1"><?= nl2br(htmlspecialchars($product['descriptions'])) ?></p>
            </div>
            <hr class="my-3">
            <div class="customer-ratings">
              <h6 class="fw-bold mb-3">Customer Ratings</h6>
              <div class="d-flex align-items-center gap-4 gap-lg-5 flex-wrap flex-lg-nowrap">
                <div class="">
                  <h1 class="mb-2 fw-bold">4.8<span class="fs-5 ms-2 text-warning"><i class="bi bi-star-fill"></i></span></h1>
                  <p class="mb-0">3.8k Verified Buyers</p>
                </div>
                <div class="vr d-none d-lg-block"></div>
                <div class="w-100">
                  <div class="rating-wrrap hstack gap-2 align-items-center">
                    <p class="mb-0">5</p>
                    <div class=""><i class="bi bi-star"></i></div>
                    <div class="progress flex-grow-1 mb-0 rounded-0" style="height: 4px;">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 75%"></div>
                    </div>
                    <p class="mb-0">1528</p>
                  </div>
                  <div class="rating-wrrap hstack gap-2 align-items-center">
                    <p class="mb-0">4</p>
                    <div class=""><i class="bi bi-star"></i></div>
                    <div class="progress flex-grow-1 mb-0 rounded-0" style="height: 4px;">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 65%"></div>
                    </div>
                    <p class="mb-0">253</p>
                  </div>
                  <div class="rating-wrrap hstack gap-2 align-items-center">
                    <p class="mb-0">3</p>
                    <div class=""><i class="bi bi-star"></i></div>
                    <div class="progress flex-grow-1 mb-0 rounded-0" style="height: 4px;">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 45%"></div>
                <div class="card-body border-top">
                  <h5 class="mb-0 fw-bold product-short-title" title="<?= htmlspecialchars($sim['name']) ?>">
                    <?= mb_strimwidth(htmlspecialchars($sim['name']), 0, 40, '...') ?>
                  </h5>
                  <div class="product-price d-flex align-items-center gap-3 mt-2">
                    <div class="h6 fw-bold">$<?= number_format($sim['price'], 2, ',', '.') ?></div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <!--end row-->
      </div>
    </div>
  </section>
<!--start more products in same category-->
<section class="section-padding">
  <div class="container">
    <div class="separator pb-3">
      <div class="line"></div>
      <h3 class="mb-0 h3 fw-bold">Similar Products </h3>
      <div class="line"></div>
    </div>
    <div class="similar-products">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-4">
        <?php
        $cat_id = $product['category_id'];
        $more_stmt = $pdo->prepare('SELECT * FROM products WHERE category_id = ? AND id != ? ORDER BY created_at DESC LIMIT 12');
        $more_stmt->execute([$cat_id, $product['id']]);
        $more_products = $more_stmt->fetchAll();
        foreach ($more_products as $item) {
          echo '<div class="col">
            <a href="product-details.php?id=' . $item['id'] . '">
              <div class="card rounded-0">
                <img src="assets/images/product-images/' . htmlspecialchars($item['thumbnail']) . '" alt="' . htmlspecialchars($item['name']) . '" class="card-img-top rounded-0" style="object-fit:cover; height:200px; width:100%;">
                <div class="card-body border-top">
                  <h5 class="mb-0 fw-bold product-short-title" title="' . htmlspecialchars($item['name']) . '">' . mb_strimwidth(htmlspecialchars($item['name']), 0, 40, '...') . '</h5>
                  <div class="product-price d-flex align-items-center gap-3 mt-2">
                    <div class="h6 fw-bold">$' . number_format($item['price'], 2, ',', '.') . '</div>
                  </div>
                </div>
              </div>
            </a>
          </div>';
        }
        ?>
      </div>
    </div>
  </div>
</section>
  <!--end product details-->


</div>
<!--end page content-->


<?php include 'footer.php'; ?>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/toastr.min.js"></script>
<script>
$('#addToCartBtn').on('click', function() {
  $.post('add_to_cart.php', {id: <?= $product['id'] ?>, qty: 1}, function(data) {
    var res = typeof data === 'string' ? JSON.parse(data) : data;
    if (res.success) {
      toastr.success('Added to cart!');
    } else {
      toastr.error(res.message || 'Add to cart failed!');
    }
  });
});
</script>
          <?php
          $cat_id = $product['category_id'];
          $sim_stmt = $pdo->prepare('SELECT * FROM products WHERE category_id = ? AND id != ? ORDER BY created_at DESC LIMIT 8');
          $sim_stmt->execute([$cat_id, $product['id']]);
          $similar_products = $sim_stmt->fetchAll();
          foreach ($similar_products as $sim) {
            echo '<div class="col">
              <a href="product-details.php?id=' . $sim['id'] . '">
                <div class="card rounded-0">
                  <img src="assets/images/product-images/' . htmlspecialchars($sim['thumbnail']) . '" alt="' . htmlspecialchars($sim['name']) . '" class="card-img-top rounded-0" style="object-fit:cover; height:200px; width:100%;">
                  <div class="card-body border-top">
                    <h5 class="mb-0 fw-bold product-short-title" title="' . htmlspecialchars($sim['name']) . '">' . mb_strimwidth(htmlspecialchars($sim['name']), 0, 40, '...') . '</h5>
                    <div class="product-price d-flex align-items-center gap-3 mt-2">
                      <div class="h6 fw-bold">$' . number_format($sim['price'], 2, ',', '.') . '</div>
                    </div>
                  </div>
                </div>
              </a>
            </div>';
          }
          ?>
