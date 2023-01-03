import React from "react";
import Footer from "./Footer";
import Navbar from "./Navbar";
import ProductList from "./ProductList";
import Slider from "./Slider";
export default function Home() {
  return (
    <div>
      <Navbar />
      <Slider />
      <ProductList />
      <Footer />
    </div>
  );
}
