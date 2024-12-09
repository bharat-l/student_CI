import logo from './logo.svg';
import './App.css';
// import { Route, Routes } from "react-router-dom";
// Use named import for LibraryPage
import { LibraryPage } from './components/LibraryPage'; // Named import

function App() {
  return (
    <div className="App">
      <header className="App-header">
        <LibraryPage />
      </header>
    </div>
  );
}

export default App;
