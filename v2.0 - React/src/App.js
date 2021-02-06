import 'fontsource-roboto';

// MUI

// components
import SignIn from './components/SignIn';

// contexts
import ThemeContext from './contexts/ThemeContext';

function App() {
  return (
    <div className="App">
      <ThemeContext>
        <SignIn />
      </ThemeContext>
    </div>
  );
}

export default App;
