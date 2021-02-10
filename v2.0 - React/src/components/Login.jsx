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

const Login = () => {
	const classes = useStyles();
	const { login } = useContext(AuthContext);
	const [email, setEmail] = useState("");
	const [password, setPassword] = useState("");
	const [error, setError] = useState({ error: false, component: '', message: '' });

	const handleSubmit = (event) => {
		event.preventDefault();

		// validation
		if (!email.length) {
			return setError({ error: true, component: 'email', message: 'Insira um email' });
		}
		if (!password.length) {
			return setError({ error: true, component: 'password', message: 'Insira uma senha' });
		}

		login(email, password)
		.then(() => {
			setError({ error: false, component: '', message: '' });
		})
		.catch(error => {
			console.log(error);
			if (error.code === "auth/wrong-password") {
				setError({ error: true, component: 'snackbar', message: 'Senha inválida' });
			}
			if (error.code === "auth/user-not-found") {
				setError({ error: true, component: 'snackbar', message: 'Usuário não encontrado' });
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
						<Button
							type="submit"
							variant="contained"
							color="primary"
							size="medium"
							className={classes.button}
						>
							Entrar
						</Button>
					</form>
					<Link to="/signup" className={classes.link}>Não possui cadastro? Cadastre-se</Link>
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

export default Login;
