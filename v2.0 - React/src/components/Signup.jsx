import { useState, useContext } from "react";
import { Link } from 'react-router-dom';

// MUI
import {
	Container,
	Grid,
	Typography,
	makeStyles,
	TextField,
	Button,
	Snackbar
} from "@material-ui/core";
import { Alert } from "@material-ui/lab"
import { AccountCircle } from "@material-ui/icons";

// Contexts
import { AuthContext } from '../contexts/AuthContext';

const useStyles = makeStyles({
	wrapper: {
		marginTop: "20%",
	},
	form: {
		width: "60%",
		display: "flex",
		flexDirection: "column",
		alignItems: "center",
	},
	input: {
		width: "100%",
		marginTop: "1rem",
	},
	button: {
		width: "75%",
		marginTop: "1rem",
	},
	link: {
		marginTop: '1rem'
	}
});

const Signup = () => {
	const classes = useStyles();
	const { signUp } = useContext(AuthContext);
	const [nome, setNome] = useState("");
	const [email, setEmail] = useState("");
	const [password, setPassword] = useState("");
  const [passwordConfirm, setPasswordConfirm] = useState("");
	const [error, setError] = useState({ error: false, component: '', message: '' });

	const handleSubmit = (event) => {
		event.preventDefault();

		// validation
		if (!nome.length) {
			return setError({ error: true, component: 'nome', message: 'Digite um nome' });
		}
		if (!email.length) {
			return setError({ error: true, component: 'email', message: 'Digite um email' });
		}
		if (!password.length) {
			return setError({ error: true, component: 'password', message: 'Digite uma senha' });
		}
		if (!passwordConfirm.length) {
			return setError({ error: true, component: 'passwordConfirm', message: 'Confirme sua senha' });
		}
		if (password !== passwordConfirm) {
			return setError({ error: true, component: 'passwordConfirm', message: 'Senhas não conferem' });
		}

		signUp(nome, email, password)
		.then(() => {
			setError({ error: false, component: '', message: '' });
		})
		.catch(error => {
			console.log(error);
			if (error.code === "auth/weak-password") {
				return setError({ error: true, component: 'snackbar', message: 'Senha deve possuir no mínimo 6 caracteres' });
			}
			if (error.code === "auth/email-already-in-use") {
				return setError({ error: true, component: 'snackbar', message: 'Esse email já está em uso' });
			}
		});
	}

	return (
		<>
			<Container component="main" maxWidth="sm">
				<Grid
					container
					direction="column"
					alignItems="center"
					className={classes.wrapper}
				>
					<AccountCircle style={{ fontSize: 45 }} />
					<Typography variant="h1">Sistema de agenda</Typography>
					<form className={classes.form} onSubmit={handleSubmit}>
						<TextField
							type="text"
							label="Nome"
							className={classes.input}
							value={nome}
							onChange={e => setNome(e.target.value)}
							error={error.component === 'nome'}
							helperText={error.component === 'nome' && error.message}
						/>
						<TextField
							type="email"
							label="Email"
							className={classes.input}
							value={email}
							onChange={e => setEmail(e.target.value)}
							error={error.component === 'email'}
							helperText={error.component === 'email' && error.message}
						/>
						<TextField
							type="password"
							label="Senha"
							className={classes.input}
							value={password}
							onChange={e => setPassword(e.target.value)}
							error={error.component === 'password'}
							helperText={error.component === 'password' && error.message}
						/>
						<TextField
							type="password"
							label="Confirme sua senha"
							className={classes.input}
							value={passwordConfirm}
							onChange={e => setPasswordConfirm(e.target.value)}
							error={error.component === 'passwordConfirm'}
							helperText={error.component === 'passwordConfirm' && error.message}
						/>
						<Button
							type="submit"
							variant="contained"
							color="primary"
							size="medium"
							className={classes.button}
						>
							Cadastrar
						</Button>
					</form>
					<Link to="/login" className={classes.link}>Já possui uma conta? Log in</Link>
				</Grid>
			</Container>

			<Snackbar
				anchorOrigin={{
          vertical: 'top',
          horizontal: 'center',
        }}
				open={error.component === "snackbar"}
				autoHideDuration={6000}
			>
				<Alert severity="error">
					{ error.component === "snackbar" && error.message }
				</Alert>
			</Snackbar>
		</>
	);
};

export default Signup;
