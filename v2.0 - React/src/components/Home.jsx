import { useContext } from 'react';
import { AuthContext } from '../contexts/AuthContext';

import { Button } from '@material-ui/core';

const Home = () => {
  const { user, logout } = useContext(AuthContext);

  return (
    <>
      <h1>Welcome</h1>
      <p>Logged in as { user.email }</p>
      <Button variant="outlined" color="secondary" onClick={logout}>Sair</Button>
    </>
  );
}
 
export default Home;