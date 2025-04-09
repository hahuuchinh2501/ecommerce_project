 <style>
    :root {
      --primary-color: #ff6b6b;
      --secondary-color: #546de5;
      --text-color: #2c3e50;
      --light-color: #f8f9fa;
    }
    
   
    .slider_section {
      padding-top: 70px;
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      min-height: 90vh;
      display: flex;
      align-items: center;
    }
    
    .detail-box {
      padding: 2rem 1rem 2rem 3rem;
    }
    
    .detail-box h1 {
      font-size: 3.5rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
      color: var(--text-color);
      line-height: 1.2;
      position: relative;
    }
    
  
    
    .detail-box p {
      font-size: 1.2rem;
      line-height: 1.7;
      color: #495057;
      margin-bottom: 2rem;
      max-width: 500px;
    }
    
    .detail-box a {
      display: inline-block;
      padding: 12px 30px;
      background-color: var(--primary-color);
      color: white;
      text-decoration: none;
      border-radius: 30px;
      font-weight: 600;
      letter-spacing: 1px;
      transition: all 0.3s ease;
      box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
    }
    
    .detail-box a:hover {
      background-color: var(--secondary-color);
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(84, 109, 229, 0.5);
    }
    
    .img-box {
      position: relative;
      overflow: hidden;
      border-radius: 10px;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }
    
    
    
    .img-box:hover img {
      transform: scale(1.05);
    }
    
    .category-badges {
      margin-top: 2rem;
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
    }
    
    .category-badge {
      padding: 8px 16px;
      background-color: white;
      border-radius: 20px;
      font-weight: 600;
      color: var(--text-color);
      font-size: 0.9rem;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      cursor: pointer;
    }
    
    .category-badge:hover {
      background-color: var(--primary-color);
      color: white;
    }
    
    .category-badge i {
      margin-right: 5px;
    }
    
    .scroll-down {
      position: absolute;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      flex-direction: column;
      align-items: center;
      color: var(--text-color);
      animation: bounce 2s infinite;
    }
    
    @keyframes bounce {
      0%, 20%, 50%, 80%, 100% {
        transform: translateY(0) translateX(-50%);
      }
      40% {
        transform: translateY(-15px) translateX(-50%);
      }
      60% {
        transform: translateY(-10px) translateX(-50%);
      }
    }
    
    @media (max-width: 992px) {
      .detail-box h1 {
        font-size: 2.8rem;
      }
      
      .slider_section {
        padding-top: 50px;
        min-height: auto;
      }
    }
    
    @media (max-width: 768px) {
      .detail-box {
        padding: 2rem 1rem;
        text-align: center;
        order: 2;
      }
      
      .detail-box h1 {
        font-size: 2.5rem;
      }
      
      .detail-box h1::after {
        left: 50%;
        transform: translateX(-50%);
      }
      
      .detail-box p {
        margin: 0 auto 2rem auto;
      }
      
      .img-box {
        margin-bottom: 2rem;
        order: 1;
      }
      
      .category-badges {
        justify-content: center;
      }
    }
  </style>