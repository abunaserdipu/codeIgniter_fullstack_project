import React, { useState, useEffect } from "react";
import axios from "axios";
import { Link } from "react-router-dom";

const ProductList = () => {
  const [products, setProducts] = useState([]);
  useEffect(() => {
    getProducts();
  }, []);

  const getProducts = async () => {
    const products = await axios.get("http://localhost:8080/frontend/products");
    setProducts(products.data);
  };

  //   const deleteProduct = async (id) => {
  //     await axios.delete(`http://localhost:8080/products/${id}`);
  //     getProducts();
  //   };

  return (
    <div>
      <h1>Admitted Students</h1>
      {/* <table classNameName="table table-striped table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Image</th>
            <th>Title</th>
            <th>Price</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          {products.map((product, index) => (
            <tr key={product.id}>
              <td>{index + 1}</td>
              <td>
                <img
                  src={`http://localhost:8080/${product.product_image}`}
                  width="50px"
                />
              </td>
              <td>{product.product_name}</td>
              <td>{product.product_price}</td>
              <td>
                <Link
                  to={`/edit/${product.id}`}
                  classNameName="btn btn-small btn-info"
                >
                  Edit
                </Link>
                <button
                  //   onClick={() => deleteProduct(product.id)}
                  classNameName="btn btn-small btn-danger"
                >
                  Delete
                </button>
              </td>
            </tr>
          ))}
        </tbody>
      </table> */}
      <div className="row">
        {products.map((product, index) => (
          <div className="col-3 my-2">
            <div className="card" key={product.id}>
              <img
                className="card-img-top"
                src={`http://localhost:8080/${product.product_image}`}
                alt="Card image"
              />
              <div className="card-body">
                <h4 className="card-title">{product.product_name}</h4>
                <p className="card-text">{product.product_details}</p>
                <a href="#" className="btn btn-primary">
                  {product.product_price}
                </a>
              </div>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
};

export default ProductList;
