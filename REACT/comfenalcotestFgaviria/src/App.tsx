import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'

function App() {
  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");
  const handleSubmit = (e: React.SyntheticEvent) => {
    e.preventDefault();
  }


  return (
    <div>
      <h1>Login Page</h1>
      <form onSubmit={(e)=>handleSubmit(e)}>
        <input type="text" placeholder="Username" value={username} onChange={setUsername} />
        <input type="password" placeholder="Password" value={password} onChange={setPassword} />
        <input type="submit" value="Login" />
      </form>
    </div>
  );
};
}

export default App
