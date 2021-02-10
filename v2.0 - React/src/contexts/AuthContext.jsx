import { createContext } from "react";
import { useAuthState } from "react-firebase-hooks/auth";
import { auth } from "../firebase/config";

export const AuthContext = createContext();

const AuthContextProvider = ({ children }) => {
	const [user, authLoading, authError] = useAuthState(auth);

	const login = (email, password) => {
		return auth.signInWithEmailAndPassword(email, password);
	};

	const logout = () => {
		return auth.signOut();
	};

	const signUp = (nome, email, password) => {
		return auth.createUserWithEmailAndPassword(email, password)
	};

	return (
		<AuthContext.Provider
			value={{
				user,
				authLoading,
				authError,
        login,
        logout,
        signUp
			}}
		>
			{children}
		</AuthContext.Provider>
	);
};

export default AuthContextProvider;
