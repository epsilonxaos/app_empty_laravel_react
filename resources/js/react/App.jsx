import Footer from '@modules/Footer'
import { AnimatePresence } from 'framer-motion'

import { useReducer } from 'react'
import { Route, Routes, useLocation } from 'react-router-dom'

import Loading from './components/Loading'
import PageTransition from './components/PageTransition'
import ScrollToTop from './components/ScrollToTop'
import Header from './modules/Header'
import Home from './pages/Home'
import PageNotFound from './pages/PageNotFound'

const initialArgs = {
	loading: true,
}

const reducer = (prev, next) => ({ ...prev, ...next })

export default function App() {
	const location = useLocation()
	const [state, dispatch] = useReducer(reducer, initialArgs)

	if (state.loading) return <Loading />

	return (
		<>
			<Header />
			<AnimatePresence mode='wait'>
				<ScrollToTop />

				<Routes
					location={location}
					key={location.pathname}>
					<Route
						index
						element={
							<PageTransition>
								<Home />
							</PageTransition>
						}
					/>

					<Route
						path='*'
						element={<PageNotFound />}
					/>
				</Routes>
			</AnimatePresence>
			<Footer />
		</>
	)
}
