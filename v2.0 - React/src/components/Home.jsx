import { useContext } from 'react';
import { AuthContext } from '../contexts/AuthContext';

// components
import Header from './Header';

const Home = () => {
  const { user } = useContext(AuthContext);

  return (
    <>
      <Header />
      <h1>Bem-vindo { user.displayName } 👋</h1>
    </>
  );
}
 
export default Home;