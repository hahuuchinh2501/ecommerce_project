<style>
    .shop_section {
      padding: 60px 0;
      background-color: #f9f9f9;
    }
    
    .product-card {
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s, box-shadow 0.3s;
      margin-bottom: 30px;
      background-color: #fff;
    }
    
    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }
    
    .img-container {
      position: relative;
      padding-top: 100%;
      overflow: hidden;
      background-color: #f5f5f5;
    }
    
    .img-container img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s;
    }
    
    .product-card:hover .img-container img {
      transform: scale(1.05);
    }
    
    .product-info {
      padding: 20px;
    }
    
    .product-title {
      font-size: 18px;
      font-weight: 600;
      margin-bottom: 8px;
      color: #333;
      height: 48px;
      overflow: hidden;
    }
    
    .product-price {
      font-size: 20px;
      font-weight: 700;
      color: #ff4c4c;
      margin-bottom: 15px;
    }
    
   .action-buttons {
    display: flex;
    justify-content: space-between; 
    align-items: center; 
}

.view-btn, .cart-form {
    flex: 1; 
}

.view-btn {
    padding: 8px 15px;
    margin-right: 20px;
    background-color: #3a3a3a;
    color: white;
    border-radius: 4px;
    text-decoration: none;
    transition: background-color 0.3s;
    text-align: center;
}

.view-btn:hover {
    background-color: white;
}

.cart-form {
    display: flex; 
    align-items: center; 
}

.quantity-input {
    width: 60px;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-right: 10px;
    text-align: center;
}

.add-cart-btn {
    padding: 8px 15px;
    background-color: rgb(255, 255, 255);
    color: black;
    border: 1px solid black;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
    flex-grow: 1;
}

.add-cart-btn:hover {
    background-color: rgb(255, 255, 255);
}
    
    .search-header {
      margin-bottom: 40px;
      position: relative;
    }
    
    .search-header h2 {
      font-size: 30px;
      position: relative;
      display: inline-block;
      padding-bottom: 15px;
    }
    
    .search-header h2:after {
      content: '';
      position: absolute;
      width: 60%;
      height: 3px;
      background-color: #ff4c4c;
      bottom: 0;
      left: 20%;
    }
    
    .search-term {
      font-weight: 700;
      color: #ff4c4c;
    }
    
    .alert {
      border-radius: 8px;
      padding: 15px 20px;
      margin-bottom: 30px;
    }
    
    .alert-success {
      background-color: #d4edda;
      border-color: #c3e6cb;
      color: #155724;
    }
    
    .alert-info {
      background-color: #fff;
      border: 1px dashed #ddd;
      padding: 30px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }
    
    .no-results-container {
      padding: 50px 20px;
    }
    
    .pagination-container {
      margin-top: 40px;
    }
    
    .pagination {
      display: flex;
      justify-content: center;
      list-style: none;
      gap: 5px;
    }
    
    .page-item.active .page-link {
      background-color: #ff4c4c;
      border-color: #ff4c4c;
    }
    
    .page-link {
      padding: 8px 16px;
      border-radius: 4px;
    }
  </style>