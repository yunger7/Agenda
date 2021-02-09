import { useContext } from 'react';
import { BrowserRouter as Router, Switch, Route, Redirect } from 'react-router-dom';
import 'fontsource-roboto';

// MUI

// components
import Login from './components/Login';
import Signup from './components/Signup';

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
    <Router>
      <div className="App">
        <Switch>
          <Route path="/login">
            <Login />
          </Route>
          <Route path="/signup">
            <Signup />
          </Route>
          <Redirect from="/" to="/login" />
        </Switch>
      </div>
    </Router>
  );
}

export default App;
