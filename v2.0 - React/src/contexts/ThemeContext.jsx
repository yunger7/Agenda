import { ThemeProvider, createMuiTheme } from '@material-ui/core';

const theme = createMuiTheme({
  typography: {
    h1: {
      textAlign: 'center'
    }
  }
});

const ThemeContext = ({ children }) => {
  return (
    <ThemeProvider theme={theme}>
      { children }
    </ThemeProvider>
  )
}

export default ThemeContext;