<?php
session_start();
require_once __DIR__ . '/config/database.php';
include 'header.php';
// Lấy giỏ hàng từ session
$cart = $_SESSION['cart'] ?? [];
$products = [];
$total = 0;
if ($cart) {
  $ids = array_keys($cart);
  if ($ids) {
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $placeholders . ')');
    $stmt->execute($ids);
    $products = $stmt->fetchAll(PDO::FETCH_UNIQUE);
  }
}
// Xử lý cập nhật/xoá sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['update_qty'])) {
    foreach ($_POST['qty'] as $id => $qty) {
      $id = (int)$id;
      $qty = max(1, (int)$qty);
      if (isset($cart[$id])) {
        $cart[$id] = $qty;
      }
    }
    $_SESSION['cart'] = $cart;
    header('Location: cart.php');
    exit;
  }
  if (isset($_POST['remove_id'])) {
    $remove_id = (int)$_POST['remove_id'];
    unset($cart[$remove_id]);
    $_SESSION['cart'] = $cart;
    header('Location: cart.php');
    exit;
  }
}
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
          <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->
  <!--start product details-->
  <section class="section-padding">
    <div class="container">
      <div class="d-flex align-items-center px-3 py-2 border mb-4">
        <div class="text-start">
          <h4 class="mb-0 h4 fw-bold">My Bag (<?= array_sum($cart) ?> items)</h4>
        </div>
        <div class="ms-auto">
          <a href="index.php" class="btn btn-light btn-ecomm">Continue Shopping</a>
        </div>
      </div>
      <form method="post">
        <div class="row g-4">
          <div class="col-12 col-xl-8">
            <?php if ($cart && $products): ?>
              <?php foreach ($cart as $id => $qty):
                $p = $products[$id];
                $subtotal = $p['price'] * $qty;
                $total += $subtotal;
              ?>
                <div class="card rounded-0 mb-3">
                  <div class="card-body">
                    <div class="d-flex flex-column flex-lg-row gap-3">
                      <div class="product-img">
                        <img src="assets/images/product-images/<?= htmlspecialchars($p['thumbnail']) ?>" width="150" alt="<?= htmlspecialchars($p['name']) ?>">
                      </div>
                      <div class="product-info flex-grow-1">
                        <h5 class="fw-bold mb-0"><?= htmlspecialchars($p['name']) ?></h5>
                        <div class="product-price d-flex align-items-center gap-2 mt-3">
                          <div class="h6 fw-bold">$<?= number_format($p['price'], 2, ',', '.') ?></div>
                          <div class="h6 fw-light text-muted">x</div>
                          <input type="number" name="qty[<?= $id ?>]" value="<?= $qty ?>" min="1" max="<?= $p['stock'] ?>" style="width:60px;" class="form-control d-inline-block">
                          <div class="h6 fw-bold ms-2">= $<?= number_format($subtotal, 2, ',', '.') ?></div>
                        </div>
                      </div>
                      <div class="d-none d-lg-block vr"></div>
                      <div class="d-grid gap-2 align-self-start align-self-lg-center">
                        <button type="submit" name="remove_id" value="<?= $id ?>" class="btn btn-ecomm"><i class="bi bi-x-lg me-2"></i>Remove</button>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
              <div class="d-grid mt-3">
                <button type="submit" name="update_qty" class="btn btn-dark btn-ecomm py-2 px-5">Update quantity</button>
              </div>
            <?php else: ?>
              <div class="alert alert-info">Your cart is empty.</div>
            <?php endif; ?>
          </div>
          <div class="col-12 col-xl-4">
            <div class="card rounded-0 mb-3">
              <div class="card-body">
                <h5 class="fw-bold mb-4">Order Summary</h5>
                <div class="hstack align-items-center justify-content-between">
                  <p class="mb-0">Bag Total</p>
                  <p class="mb-0">$<?= number_format($total, 2, ',', '.') ?></p>
                </div>
                <hr>
                <div class="hstack align-items-center justify-content-between fw-bold text-content">
                  <p class="mb-0">Total Amount</p>
                  <p class="mb-0">$<?= number_format($total, 2, ',', '.') ?></p>
                </div>
                <div class="d-grid mt-4">
                  <button type="button" class="btn btn-dark btn-ecomm py-3 px-5" id="placeOrderBtn">Place Order</button>
                </div>
              </div>
            </div>
            <div class="card rounded-0">
              <div class="card-body">
                <h5 class="fw-bold mb-4">Apply Coupon</h5>
                <div class="input-group">
                  <input type="text" class="form-control rounded-0" placeholder="Enter coupon code">
                  <button class="btn btn-dark btn-ecomm rounded-0" type="button">Apply</button>
                </div>
              </div>
            </div>
          </div>
        </div><!--end row-->
      </form>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/toastr.min.js"></script>
    <script>
    $('#placeOrderBtn').on('click', function() {
      $.post('place_order.php', {}, function(data) {
        try {
          var res = typeof data === 'string' ? JSON.parse(data) : data;
          if (res.success) {
            toastr.success('Order placed successfully!');
            setTimeout(function(){ window.location.href = 'order-success.php'; }, 1200);
          } else {
            toastr.error(res.message || 'Order failed!');
          }
        } catch(e) {
          toastr.error('Something went wrong!');
        }
      });
    });
    </script>
    </div>
    </section>
</div>
<div class="offcanvas-footer p-3 border-top">


<!--end page content-->

<?php include 'footer.php'; ?>