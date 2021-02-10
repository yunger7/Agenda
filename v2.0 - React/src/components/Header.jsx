import { useContext, useState } from "react";
import { AuthContext } from "../contexts/AuthContext";

// MUI
import {
	AppBar,
	Toolbar,
	Typography,
	makeStyles,
	Button,
	Drawer,
	IconButton,
	List,
	ListItem,
	ListItemIcon,
	ListItemText,
} from "@material-ui/core";
import {
  Menu,
  AccountCircle,
  Home,
  People,
  AccountBox,
  Delete,
} from "@material-ui/icons";

const useStyles = makeStyles((theme) => ({
	root: {
		flexGrow: 1,
	},
	menuButton: {
		marginRight: theme.spacing(2),
	},
	accountCircle: {
		marginRight: theme.spacing(1),
		fontSize: 30,
	},
	title: {
		display: "flex",
		alignItems: "center",
		justifyContent: "center",
		flexGrow: 1,
	},
  list: {
    width: 225
  }
}));

const Header = () => {
	const classes = useStyles();
	const { logout } = useContext(AuthContext);
	const [openDrawer, setOpenDrawer] = useState(false);

	return (
		<div className={classes.root}>
			<AppBar position="sticky">
				<Toolbar>
					<IconButton
						edge="start"
						className={classes.menuButton}
						color="inherit"
						aria-label="menu"
						onClick={() => setOpenDrawer(!openDrawer)}
					>
						<Menu />
					</IconButton>
					<Typography variant="h6" className={classes.title}>
						<AccountCircle className={classes.accountCircle} />
						Sistema de agenda
					</Typography>
					<Button color="inherit" onClick={logout}>
						Sair
					</Button>
				</Toolbar>
			</AppBar>
			<Drawer open={openDrawer} onClose={() => setOpenDrawer(false)}>
				<List className={classes.list}>
					<ListItem button>
            <ListItemIcon><Home /></ListItemIcon>
						<ListItemText>Home</ListItemText>
					</ListItem>
					<ListItem button>
            <ListItemIcon><AccountBox /></ListItemIcon>
						<ListItemText>Usuários</ListItemText>
					</ListItem>
					<ListItem button>
            <ListItemIcon><People /></ListItemIcon>
						<ListItemText>Pessoas</ListItemText>
					</ListItem>
					<ListItem button>
            <ListItemIcon><Delete /></ListItemIcon>
						<ListItemText>Lixeira</ListItemText>
					</ListItem>
				</List>
			</Drawer>
		</div>
	);
};

export default Header;
