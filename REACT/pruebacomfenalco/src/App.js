import { BrowserRouter, Routes, Route} from "react-router-dom"
import LoguinForm from "./LoguinForm";
import './App.css';

function App() {
  return (
    <div className="App">
    <BrowserRouter>
        <Routes>
          <Route path='/' element={ <LoguinForm /> }/>
        </Routes>
    </BrowserRouter>
</div>
  );
}

export default App;
