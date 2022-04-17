function [child] = gene_mutation (parent, mu, VarMin, VarMax)

% This parent must be relected at random child is parent having a gene transformed

    nVar=numel(parent);
    nmu=ceil(mu*nVar);
    j=randsample(nVar,1);
    child=parent;
    child(j)=parent(j)- rand*parent(j);

end