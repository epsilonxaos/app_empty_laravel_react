import { LazyLoadImage } from "react-lazy-load-image-component";
import Container from "../../components/utils/Container";
import Parrafo from "../../components/utils/Parrafo";
import { ESPORA, MEDICINA } from "../../icons/icons";

export default function Inicio() {
    return (
        <Container
            className="pb-[40px] px-0 relative z-[5] lg:pt-[90px]"
            classNameSection="bg-[#ededed]"
        >
            <div className="flex flex-col-reverse md:flex-row md:items-end">
                <div className="w-full md:w-1/2 lg:w-1/3 px-4">
                    <h1 className="text-center md:text-left text-2xl xl:text-4xl font-bold mb-8">
                        <span className="text-base xl:text-xl">
                            ANTE TODO SIEMPRE;
                        </span>{" "}
                        <br />
                        TU SALUD.
                    </h1>

                    <Parrafo className="text-base xl:text-xl md:max-w-[350px]">
                        Nos enfocamos en brindar mejores y más eficientes
                        servicios de análisis clínicos que te ayuden a
                        monitorear lo más importante:{" "}
                        <span className="font-bold">tu salud.</span>
                    </Parrafo>
                </div>

                <figure className="mb-[20px] md:mb-0 md:w-1/2 lg:w-2/3 relative">
                    <LazyLoadImage
                        className="object-cover h-[65vh] min-h-[400px] max-h-[650px] w-full"
                        src="https://images.pexels.com/photos/356040/pexels-photo-356040.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    />

                    <div className="absolute bottom-[-65px] right-10">
                        <ESPORA />
                    </div>
                </figure>
            </div>

            <div className="absolute bottom-[-40px] left-[40%] translate-x-[-50%] z-10">
                <MEDICINA />
            </div>
        </Container>
    );
}
