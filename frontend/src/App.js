import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import ProductList from "./components/ProductList";

function App() {
  return (
    <Router>
      <div className="container">
        <Routes>
          <Route exact path="/" element={<ProductList />} />
        </Routes>
      </div>
    </Router>
  );
}

export default App;
