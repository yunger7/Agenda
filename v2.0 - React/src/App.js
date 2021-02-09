import 'fontsource-roboto';
import { useContext } from 'react';

// MUI

// components
import SignIn from './components/SignIn';

// contexts
import { AuthContext } from './contexts/AuthContext';

function App() {
  const { user, authLoading, authError } = useContext(AuthContext);

  if (authLoading) {
    return (
      <div className="App">
        <h3>Loading...</h3>
      </div>  
    )
  }

  if (authError) {
    return (
      <div className="App">
        <h3>Woops! (っ °Д °;)っ</h3>
        <p>{ authError }</p>
      </div>
    )
  }

  if (user) {
    return (
      <div className="App">
        <h3>Welcome!</h3>
      </div>
    )
  }

  return (
    <div className="App">
      <SignIn />
    </div>
  );
}

export default App;
