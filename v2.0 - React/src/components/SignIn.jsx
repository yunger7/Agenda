import { Container, Grid, Typography, makeStyles, TextField, Button, Avatar } from '@material-ui/core';
import { AccountCircle } from '@material-ui/icons';

const useStyles = makeStyles({
  wrapper: {
    marginTop: '10%',
  },
  form: {
    width: '60%',
    display: 'flex',
    flexDirection: 'column',
    alignItems: 'center'
  },
  input: {
    width: '100%',
    marginTop: '1rem'
  },
  button: {
    width: '75%',
    marginTop: '1rem',
  }
});

const SignIn = () => {
  const classes = useStyles();

  return (
    <Container component="main" maxWidth="sm">
      <Grid container direction="column" alignItems="center" className={classes.wrapper}>
        <AccountCircle fontSize="large" />
        <Typography variant="h1">Sistema de agenda</Typography>
        <form className={classes.form}>
          <TextField type="email" label="Email" required className={classes.input} />
          <TextField type="password" label="Senha" required className={classes.input} />
          <Button variant="contained" color="primary" size="medium" className={classes.button}>Entrar</Button>
        </form>
      </Grid>
    </Container>
  )
}

export default SignIn;