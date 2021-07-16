import { CardAction, CardImage } from 'botframework-directlinejs';
import * as AdaptiveCardSchema from "microsoft-adaptivecards/built/schema";
export declare class AdaptiveCardBuilder {
    container: AdaptiveCardSchema.IContainer;
    card: AdaptiveCardSchema.ICard;
    constructor();
    addColumnSet(sizes: number[], container?: AdaptiveCardSchema.IContainer): AdaptiveCardSchema.IColumn[];
    addItems(elements: AdaptiveCardSchema.ICardElement[], container?: AdaptiveCardSchema.IContainer): void;
    addTextBlock(text: string, template: Partial<AdaptiveCardSchema.ITextBlock>, container?: AdaptiveCardSchema.IContainer): void;
    addButtons(buttons: CardAction[]): void;
    private static addCardAction(cardAction);
    addCommon(content: ICommonContent): void;
    addImage(image: CardImage, container?: AdaptiveCardSchema.IContainer): void;
}
export interface ICommonContent {
    title?: string;
    subtitle?: string;
    text?: string;
    buttons?: CardAction[];
}
export declare const buildCommonCard: (content: ICommonContent) => AdaptiveCardSchema.ICard;
