import { useContext } from 'react';
import { AuthContext } from '../contexts/AuthContext';

import { Button } from '@material-ui/core';

const Home = () => {
  const { user, logout } = useContext(AuthContext);

  return (
    <>
      <h1>Bem-vindo { user.displayName } 👋</h1>
      <Button variant="outlined" color="secondary" onClick={logout}>Sair</Button>
    </>
  );
}
 
export default Home;