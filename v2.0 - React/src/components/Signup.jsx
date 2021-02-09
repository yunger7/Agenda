import { useState } from "react";
import { Link } from 'react-router-dom';
import {
	Container,
	Grid,
	Typography,
	makeStyles,
	TextField,
	Button,
} from "@material-ui/core";
import { AccountCircle } from "@material-ui/icons";

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
	const [email, setEmail] = useState("");
	const [password, setPassword] = useState("");
  const [passwordConfirm, setPasswordConfirm] = useState("");

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
				<form className={classes.form}>
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
					<TextField
						type="password"
						label="Confirme sua senha"
						required
						className={classes.input}
            value={passwordConfirm}
            onChange={e => setPasswordConfirm(e.target.value)}
					/>
					<Button
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
	);
};

export default Signup;