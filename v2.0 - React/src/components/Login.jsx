import { useState, useContext, useEffect } from "react";
import { Link } from 'react-router-dom';

// MUI
import {
	Container,
	Grid,
	Typography,
	makeStyles,
	TextField,
	Button,
} from "@material-ui/core";
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
	const [email, setEmail] = useState("");
	const [password, setPassword] = useState("");
	const { user, login } = useContext(AuthContext);

	const handleSubmit = (event) => {
		console.log('submit form');
		event.preventDefault();
		login(email, password);
	}

	useEffect(() => {
		console.log(user);
	}, [user])

	return (
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
						required
						className={classes.input}
            value={email}
            onChange={e => setEmail(e.target.value)}
					/>
					<TextField
						type="password"
						label="Senha"
						required
						className={classes.input}
            value={password}
            onChange={e => setPassword(e.target.value)}
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
				<Link to="/signup" className={classes.link}>Don't have an account? Sign up instead!</Link>
			</Grid>
		</Container>
	);
};

export default Login;