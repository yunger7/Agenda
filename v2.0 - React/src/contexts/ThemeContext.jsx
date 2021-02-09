import { ThemeProvider, createMuiTheme } from '@material-ui/core';

const theme = createMuiTheme({
  typography: {
    h1: {
      textAlign: 'center',
      fontSize: '36px'
    }
  }
});

const ThemeContextProvider = ({ children }) => {
  return (
    <ThemeProvider theme={theme}>
      { children }
    </ThemeProvider>
  )
}

export default ThemeContextProvider;