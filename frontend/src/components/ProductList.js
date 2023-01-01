import React, { useState, useEffect } from "react";
import axios from "axios";
import { Link } from "react-router-dom";

const ProductList = () => {
  const [products, setProducts] = useState([]);
  useEffect(() => {
    getProducts();
  }, []);

  const getProducts = async () => {
    const products = await axios.get("http://localhost:8080/products");
    setProducts(products.data.products);
  };

  //   const deleteProduct = async (id) => {
  //     await axios.delete(`http://localhost:8080/products/${id}`);
  //     getProducts();
  //   };

  return (
    <div>
      <Link to="/add" className="button is-primary mt-5">
        Add New
      </Link>
      <table className="table table-striped table-hover">
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
                  className="btn btn-small btn-info"
                >
                  Edit
                </Link>
                <button
                  //   onClick={() => deleteProduct(product.id)}
                  className="btn btn-small btn-danger"
                >
                  Delete
                </button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

export default ProductList;
